
#include <SoftwareSerial.h>

SoftwareSerial mySerial(2, 3);

void autosend(char str[]) {
  Serial.print(str);
  mySerial.write(str);
  mySerial.write("\r\n");
  String rec = mySerial.readString();
  if (rec.indexOf("ALR") != -1) return;
  if (rec.indexOf("CTED") != -1) return;
  Serial.print(rec);
  while (rec.indexOf("OK") == -1) {
    String rec = mySerial.readString();
    Serial.print("!");
    if (rec.indexOf("OK") != -1) break;
    delay(50);
  }
}

String senddata(String num, String str) {
  autosend("AT+CIPSTART=\"TCP\",\"134.208.0.210\",1989");

  mySerial.print("AT+CIPSEND=" + num + "\r\n");

  delay(1000);

  while (mySerial.available()) {
    int inByte = mySerial.read();
  }

  mySerial.print(str);
  mySerial.write("\r\n\r\n");
  //  autosend("AT+CIPCLOSE");
  return mySerial.readString();
}

void setup()  {
  Serial.begin(115200);
  mySerial.begin(115200);
  pinMode(13, OUTPUT);
  digitalWrite(13, HIGH);

  autosend("AT");
  autosend("AT+CWMODE=1");
  autosend("AT+CWJAP=\"landis\",\"landisb201\"");

  //mySerial.write("AT+CIFSR\r\n");
  //  Serial.println("AT+CIFSR");
  //  String data = mySerial.readString();
  //  Serial.println(data);
  Serial.println("done");
}

void loop()  {
  if (mySerial.available()) {
    int inByte = mySerial.read();
    Serial.write(inByte);
  }

  if (Serial.available()) {
    String data = Serial.readString();
    String num = String(data.length() + 4);
    String rec = senddata(num, data);
    Serial.println(rec);
    rec.remove(0, rec.length() - 1);
    if (rec == "0") {
      digitalWrite(13, LOW);
    }
    else {
      digitalWrite(13, HIGH);
    }
  }
}
