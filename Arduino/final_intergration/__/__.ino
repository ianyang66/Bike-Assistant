#include <SPI.h>
#include <MFRC522.h>
//使用arduino IDE自帶的Stepper.h庫檔案
#include <Stepper.h>
#include <Wire.h> 
#include <LiquidCrystal_I2C.h> 
#include <SoftwareSerial.h>
#define STEPS 200
#include <TinyGPS++.h>
#include <math.h>
#define RST_PIN         9          
#define SS_PIN          10  //就是模組上的SDA接腳
const int buzzerPin = A3;//蜂鳴器
int led = 8;  // 震動感測器 D0
const int vibr = A2 ;// LED 輸出接腳
const int buzzer = A3;//蜂鳴器
LiquidCrystal_I2C lcd(0x27,16,2);//設定LCD位置0x27,設定LCD大小為16*2
TinyGPSPlus gps;
int a=0 ;
int b=0;
float lat=0;
float lng=0;
char *reference;
 String yes="Hello, World!";
Stepper stepper(STEPS, 4, 5, 6, 7);
byte uid[]={0x5A, 0x1E, 0x97, 0x7F};//這是我們指定的卡片UID，可由讀取UID的程式取得特定卡片的UID，再修改這行

MFRC522 mfrc522;   // 建立MFRC522實體
SoftwareSerial mySerial(2, 3);
void autosend(char str[])//網路
{
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
String senddata(String num, String str)//網路
{
  
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

void Bee(){
    beep(50); //Beep every 500 milliseconds
  delay(500);
}
void beep(unsigned char delayms) { //creating function
  digitalWrite(buzzerPin, HIGH); //Setting pin to high
  delay(delayms); //Delaying
  digitalWrite(buzzerPin ,LOW); //Setting pin to LOW
  delay(delayms); //Delaying
  digitalWrite(buzzerPin, HIGH); //Setting pin to high
}
void setup()
 {
  Serial.begin(115200); 
   mySerial.begin(115200); 
   
 
 
  // put your setup code here, to run once:
  lcd.init(); //初始化LCD 
  lcd.begin(16, 2);
  lcd.backlight(); //開啟背光
  lcd.print(yes); //顯示Hello, World!

  pinMode(vibr,INPUT);
  pinMode(led,OUTPUT); 
  
// 設定電機的轉速：每分鐘為90步
  stepper.setSpeed(90);
  // 初始化串列埠，用於除錯輸出資訊
pinMode(buzzerPin, OUTPUT); //Set buzzerPin as output
 
digitalWrite(buzzerPin, HIGH); //Setting pin to high
 
  SPI.begin();        // 初始化SPI介面

  mfrc522.PCD_Init(SS_PIN, RST_PIN); // 初始化MFRC522卡
  Serial.print(F("Reader "));
  Serial.print(F(": "));
  
  mfrc522.PCD_DumpVersionToSerial(); // 顯示讀卡設備的版本
 Serial.println(TinyGPSPlus::libraryVersion());


 

} 
void WIFIsend(){
    Serial.begin(115200); 
   mySerial.begin(115200); 
autosend("AT");
  autosend("AT+CWMODE=1");
  autosend("AT+CWJAP=\"landis\",\"landisb201\"");
  String content;


 Serial.println("done");
 String num;
String remind;
String message;

  content=(String)lat+(String)lng ;
  num=(String)(content.length()+4);
  

  remind= senddata(num,content); 
  message=str.strip( ':' )
  Serial.println("")
  //mySerial.write("AT+CIFSR\r\n");
  //  Serial.println("AT+CIFSR");
  //  String data = mySerial.readString();
  //  Serial.println(data);
   autosend("AT+CIPCLOSE");
  }

void motor()//馬達正轉
{
     Serial.println("正");
    stepper.step(2048); //4步模式下旋轉一週用2048 步。
    delay(500);
  }
void motor2()//馬達反轉
{
     Serial.println("反");
    stepper.step(-2048); //4步模式下旋轉一週用2048 步。
    delay(500);
  }
  void GPS()
{
 
     lat=gps.location.lat();
    lng=gps.location.lng();
    Serial.print("LAT="); Serial.print(gps.location.lat(), 6);
    Serial.print("LNG="); Serial.println(gps.location.lng(), 6);

  
  }
  void virbrate()
  {while(1){
    
    int val;
  
    b=0;
    Serial.print("YES");
     val=digitalRead(vibr);
     Serial.println(val);
     if(val==1)   
   {Bee();
     GPS();
     WIFIsend();
   } 
    bool they_match =false;
    if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      bool they_match = true; // 初始值是假設為真 
       /*Serial.print(F("Card UID:"));
      dump_byte_array(mfrc522.uid.uidByte, mfrc522.uid.size); // 顯示卡片的UID
       Serial.println();
      Serial.print(F("PICC type: "));
      MFRC522::PICC_Type piccType = mfrc522.PICC_GetType(mfrc522.uid.sak);
      Serial.println(mfrc522.PICC_GetTypeName(piccType));  //顯示卡片的類型*/
    
 for ( int i = 0; i < 4; i++ ) { // 卡片UID為4段，分別做比對
        if ( uid[i] != mfrc522.uid.uidByte[i] ) { 
          they_match = false; // 如果任何一個比對不正確，they_match就為false，然後就結束比對
         
          break; 
     } 
     mfrc522.PICC_HaltA();  // 卡片進入停止模式


                               }
 
  if(they_match)
        {
          b=1;
 mfrc522.PICC_HaltA();  // 卡片進入停止模式

         return;
         }
         } 
   }
   }
   void LCD(){ 
  lcd.scrollDisplayLeft();  //往左捲動
 delay(400);   //延遲0.4秒
 }

void loop() { 
  SPI.begin();        // 初始化SPI介面
   
 
 
  if (mySerial.available()) {
    int inByte = mySerial.read();
    Serial.write(inByte);
  }
  // 檢查是不是一張新的卡
 
  
  if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      // 顯示卡片內容

      Serial.print(F("Card UID:"));
      dump_byte_array(mfrc522.uid.uidByte, mfrc522.uid.size); // 顯示卡片的UID
      Serial.println();
      Serial.print(F("PICC type: "));
      MFRC522::PICC_Type piccType = mfrc522.PICC_GetType(mfrc522.uid.sak);
      Serial.println(mfrc522.PICC_GetTypeName(piccType));  //顯示卡片的類型
      bool they_match = true; // 初始值是假設為真 
      for ( int i = 0; i < 4; i++ ) { // 卡片UID為4段，分別做比對
        if ( uid[i] != mfrc522.uid.uidByte[i] ) { 
          they_match = false; // 如果任何一個比對不正確，they_match就為false，然後就結束比對
          break; 
        }
     
      }
      
      if(they_match||b==1){
        b=0;
        beep(1);
      if(a%2==1){
      motor2();
      a=0;
    
      Serial.println(a);
        Serial.println(b);
      
      }   
     else if(a%2==0){ 
         
         motor();
         a=1;
         LCD();
         Serial.println(a);
          Serial.println(b);
         GPS();
         WIFIsend();
        
   Serial.println(b);
         virbrate();
         }
      }else{
        Serial.print(F("Access Denied!"));
      }
      mfrc522.PICC_HaltA();  // 卡片進入停止模式
    }
   

}

/**
 * 這個副程式把讀取到的UID，用16進位顯示出來
 */
void dump_byte_array(byte *buffer, byte bufferSize) {
  for (byte i = 0; i < bufferSize; i++) {
    Serial.print(buffer[i] < 0x10 ? " 0" : " ");
    Serial.print(buffer[i], HEX);
  }
}
