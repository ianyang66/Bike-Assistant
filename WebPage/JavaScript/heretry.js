/**
 * Moves the map to display over Berlin
 *
 * @param  {H.Map} map      A HERE Map instance within the application
 * @pama   {H.service.Platform} platform    A stub class to access HERE services
 */


function switchMapLanguage(map, platform){
  // Create default layers
  let defaultLayers = platform.createDefaultLayers({
    lg: 'zh'
  });
  // Set the normal map variant of the vector map type
  map.setBaseLayer(defaultLayers.vector.normal.map);

  // Display default UI components on the map and change default
  // language to simplified Chinese.
  // Besides supported language codes you can also specify your custom translation
  // using H.ui.i18n.Localization.
  var ui = H.ui.UI.createDefault(map, defaultLayers, 'zh-CN');

  // Remove not needed settings control
  ui.removeControl('mapsettings');
}


function moveMapTondhu(map){
    map.setCenter({lat:23.89751, lng:121.54161});
    map.setZoom(14);
  }
var a,b;
var s;
function addDomMarker(map,a,b,s) {
    var outerElement = document.createElement('div'),
        innerElement = document.createElement('div');
  
    outerElement.style.userSelect = 'none';
    outerElement.style.webkitUserSelect = 'none';
    outerElement.style.msUserSelect = 'none';
    outerElement.style.mozUserSelect = 'none';
    outerElement.style.cursor = 'default';
  
    innerElement.style.color = 'black';
    //innerElement.style.backgroundColor = 'blue';
    //innerElement.style.border = '2px solid black';
    innerElement.style.font = 'normal 2px arial';
    //innerElement.style.lineHeight = '12px'
  
    //innerElement.style.paddingTop = '2px';
    //innerElement.style.paddingLeft = '4px';
    //innerElement.style.width = '20px';
    //innerElement.style.height = '40px';
  
    // add negative margin to inner element
    // to move the anchor to center of the div
    innerElement.style.marginTop = '-10px';
    innerElement.style.marginLeft = '-10px';
  
    outerElement.appendChild(innerElement);
  
    // Add text to the DOM element
    innerElement.innerHTML = s;
  
    function changeOpacity(evt) {
      evt.target.style.opacity = 0.6;
    };
  
    function changeOpacityToOne(evt) {
      evt.target.style.opacity = 1;
    };
  
    //create dom icon and add/remove opacity listeners
    var domIcon = new H.map.DomIcon(outerElement, {
      // the function is called every time marker enters the viewport
      onAttach: function(clonedElement, domIcon, domMarker) {
        clonedElement.addEventListener('mouseover', changeOpacity);
        clonedElement.addEventListener('mouseout', changeOpacityToOne);
      },
      // the function is called every time marker leaves the viewport
      onDetach: function(clonedElement, domIcon, domMarker) {
        clonedElement.removeEventListener('mouseover', changeOpacity);
        clonedElement.removeEventListener('mouseout', changeOpacityToOne);
      }
    });
  
    // Marker for Chicago Bears home
    var xiangqingMarker = new H.map.DomMarker({lat:a, lng: b}, {
      icon: domIcon
    });
    map.addObject(xiangqingMarker);

  }  
  function moveMapTondhu(map){
    
    map.setCenter({lat:lati, lng:long});
    map.setZoom(18);
  }

function addMarkersToMap(map) {
    var xiangqingMarker = new H.map.Marker({lat:lati, lng: long});
    map.addObject(xiangqingMarker);
}



  /**
   * Boilerplate map initialization code starts below:
   */
  
  //Step 1: initialize communication with the platform
  // In your own code, replace variable window.apikey with your own apikey
  var platform = new H.service.Platform({
    'apikey': ''
  });
  var defaultLayers = platform.createDefaultLayers();
  
  //Step 2: initialize a map - this map is centered over Europe
  var map = new H.Map(document.getElementById('map'),
    defaultLayers.vector.normal.map,{
    center: {lat:50, lng:5},
    zoom: 4,
    pixelRatio: window.devicePixelRatio || 1
  });
  // add a resize listener to make sure that the map occupies the whole container
  window.addEventListener('resize', () => map.getViewPort().resize());
  
  //Step 3: make the map interactive
  // MapEvents enables the event system
  // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
  var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
  
  // Create the default UI components
  var ui = H.ui.UI.createDefault(map, defaultLayers);
  /*function test(){
    alert('Print php variable : '+ aaa); 
 }
 */
  // Now use the map as required...
  window.onload = function () {
    //addDomMarker(map);
    addDomMarker(map,23.89736624663214, 121.53498146742444,'向晴莊');
    addDomMarker(map,23.89662856067416, 121.53407843293822,'涵星二莊');
    addDomMarker(map,23.895758965200372, 121.53500818442106,'仰山莊');
    addDomMarker(map,23.894932975167432, 121.53520298707853,'多容館');

    addDomMarker(map,23.89518328937769, 121.53543503888562,'全家超商壽豐東華二店');
    addDomMarker(map,23.895080615889988, 121.53514481668113,'棉花田麵包坊(東華店)');
    addDomMarker(map,23.89482457776677, 121.53504113838203,'臻麵館&樂芙');
    addDomMarker(map,23.893556649962687, 121.53618193037813,'(學生宿舍)擷雲莊');
    addDomMarker(map,23.893257337216728, 121.53587825347228,'擷雲莊');
    addDomMarker(map,23.892997407170597, 121.5351352142937,'(學生宿舍)擷雲莊');
    addDomMarker(map,23.892910763705814, 121.53460754879008,'(學生宿舍)擷雲莊');
    addDomMarker(map,23.892576004319213, 121.53535704917891,'(學生宿舍)擷雲莊');
    addDomMarker(map,23.89328070034536, 121.53467664438061,'自行車店');
    addDomMarker(map,23.892418068878964, 121.53607041768808,'社區球場一');
    addDomMarker(map,23.892322730953396, 121.53726858828718,'東華K書中心A館');
    addDomMarker(map,23.892371289908972, 121.53721521273864,'台灣企銀ATM');
    addDomMarker(map,23.89232526247284, 121.53717493971651,'中華郵政ATM');
    addDomMarker(map,23.89207229317619, 121.53707364976108,'或許是咖啡館');
    addDomMarker(map,23.890942446432984, 121.53819595625535,'東華附屬花蓮縣私立實驗幼兒園');
    addDomMarker(map,23.890811462828292, 121.53893308479854,'學人宿舍一');
    addDomMarker(map,23.891123441749404, 121.53893568949292,'學人宿舍一');
    addDomMarker(map,23.891456853505076, 121.53891745663239,'學人宿舍一');
    addDomMarker(map,23.890823370434507, 121.53914146034741,'學人宿舍一');
    addDomMarker(map,23.891149638418458, 121.53915448381923,'學人宿舍一');
    addDomMarker(map,23.891444945957176, 121.53916750729103,'學人宿舍一');
    addDomMarker(map,23.89080908130692, 121.53953997858461,'學人宿舍一');

    addDomMarker(map,23.891113915686617, 121.5395347691959,'學人宿舍一');
    addDomMarker(map,23.891128204780546, 121.53952435041845,'學人宿舍一');
    addDomMarker(map,23.89113534932691, 121.53975356352218,'學人宿舍一');
    addDomMarker(map,23.891444945957176, 121.53952435041845,'學人宿舍一');
    addDomMarker(map,23.891440182937703, 121.53975095882782,'學人宿舍一');
    addDomMarker(map,23.891978403043463, 121.53893308479623,'學人宿舍一');
    addDomMarker(map,23.891973640043634, 121.53917271667744,'學人宿舍一');
    addDomMarker(map,23.892292760644086, 121.53895131765678,'學人宿舍一');
    addDomMarker(map,23.892299905126126, 121.53917011198307,'學人宿舍一');
    addDomMarker(map,23.892292760644086, 121.5395347691936,'學人宿舍一');
    addDomMarker(map,23.892295142138146, 121.53954518797104,'學人宿舍一');
    addDomMarker(map,23.891976021543567, 121.53953216449922,'學人宿舍一');
    addDomMarker(map,23.8919617325433, 121.53975356351991,'學人宿舍一');
    addDomMarker(map,23.892283234668753, 121.54035003856937,'學人宿舍一');
    addDomMarker(map,23.891966495544914, 121.54033961979194,'學人宿舍一');
    addDomMarker(map,23.89143303841832, 121.54010780199397,'學人宿舍一');
    addDomMarker(map,23.89112582327514, 121.54033961979208,'學人宿舍一');
    addDomMarker(map,23.890804318267755, 121.54010780199299,'學人宿舍一');
    addDomMarker(map,23.892768175880317, 121.54252519926163,'藝術學院');
    addDomMarker(map,23.892895919326953, 121.54571274023687,'太魯閣客運東華站');
    addDomMarker(map,23.894203418311278, 121.54198305828781,'人社三館');
    addDomMarker(map,23.89511728520953, 121.54200882467534,'人社一館');
    addDomMarker(map,23.896214932987096, 121.54150180590757,'人社二館');
    addDomMarker(map,23.89611978886005, 121.53973723543282,'花師教育學院');
    addDomMarker(map,23.899377726778045, 121.53363583763907,'高爾夫球場');
    //addDomMarker(map,23.899419158200214, 121.53971964355588,'華湖');
    addDomMarker(map,23.902443616839097, 121.53762373280382,'東華大學運動場');
    addDomMarker(map,23.90165643578011, 121.54016148430331,'東華體育活動中心');
    addDomMarker(map,23.898633340432887, 121.54131511453745,'東華學生活動中心');
    addDomMarker(map,23.89740864459853, 121.54034837315298,'東華管理學院');
    addDomMarker(map,23.89691183071717, 121.54214916592798,'東華圖書館');
    addDomMarker(map,23.897090914984982, 121.543608755865,'東華理工一館');
    addDomMarker(map,23.896137721537396, 121.54373512728782,'湖畔餐廳');
    addDomMarker(map,23.8959759668005, 121.5432170044543,'ii Cafè');
    addDomMarker(map,23.894269695395916, 121.54338580839455,'東華行政大樓');
    //addDomMarker(map,23.89515099886835, 121.5441087481805,'東湖');
    addDomMarker(map,23.89560216496376, 121.5463244039992,'東華原民學院');
    addDomMarker(map,23.89455937806185, 121.54788120178915,'東華度假會館');
    addDomMarker(map,23.894933518109156, 121.5492653054859,'環境解說中心');
    addDomMarker(map,23.89594589162951, 121.5486454677543,'東華環境學院');
    addDomMarker(map,23.89565207679739, 121.55219204193722,'汙水處理場');
    addDomMarker(map,23.896874637415976, 121.55126965428008,'倉庫');
    //addDomMarker(map,23.899939207257045, 121.5476377543468,'小華湖');
    addDomMarker(map,23.90002477866988, 121.5495957949191,'迎曦莊');
    addDomMarker(map,23.901538708345104, 121.54853600092171,'沁月莊');
    addDomMarker(map,23.901997822097762, 121.54731354547204,'中華郵政ATM');
    addDomMarker(map,23.901957816120476, 121.54701999734817,'台新ATM');
    addDomMarker(map,23.90206116486985, 121.54701452750734,'全家便利商店壽豐東華店');
    addDomMarker(map,23.90202115891214, 121.5471968555346,'集賢館');
    addDomMarker(map,23.902441220850537, 121.54730260579039,'六期籃球場');
    addDomMarker(map,23.901503025248047, 121.5458973682951,'行雲莊');
    addDomMarker(map,23.89937332064209, 121.54438352540316,'東華理工二館');
    addDomMarker(map,23.898400740283883, 121.54449252002901,'東華創新育成中心');
    addDomMarker(map,23.897874587218233, 121.54478462561917,'東華生科系');
    addDomMarker(map,23.897483957015798, 121.54498081595554,'Tesla電動汽車充電站');
    //addDomMarker(map,,'莊');
    addMarkersToMap(map)
    moveMapTondhu(map);
    //test();
  }
  switchMapLanguage(map, platform);
             