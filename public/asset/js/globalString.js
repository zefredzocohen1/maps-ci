function validateJson(a){
    if (/^[\],:{}\s]*$/.test(a.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, '')))return true
    else return false;
}
var strageties = ['vmsTx','vmsTsx','vmsTdbx','vmsTsdbx' ,'vmsFreq','vmsGt', 'vmsStartTime','vmsEndTime']
var strageties1 = {'vmsStartTime':['hour_on','minute_on'],'vmsEndTime':['hour_off','minute_off']}
var strageties2 = {'vmsTx':1,'vmsTsx':1,'vmsTdbx':1,'vmsTsdbx':1 ,'vmsFreq':2,'vmsGt':2, 'vmsStartTime':3,'vmsEndTime':3};
var stragetiesOther = {vmsSectionDay:1,op1:2,op2:2,
    otherStartTime:3,otherEndTime:3,otherBlinkTime:3,
    otherAlpha:4};
var stragetiesOther2 = {'otherStartTime':['hour_on','minute_on'],otherEndTime:['hour_off','minute_off'],otherBlinkTime:['hour_blink','minute_blink']}
function createArr(){
    var a=[]
  for(i=0;i<8;i++){
    a[i] = {hour_on:'',hour_off:'',minute_on:'',minute_off:'',freq:'',gt:'',tv:'',tx:['','','','','','','',''],tsx:['','','','','','','',''],tdbx:['','','','','','','',''],tsdbx:['','','','','','','','']};
  }
  return a;
}

function setStrageties(config){
    console.log(config);
    var _strageties = window.strageties2;
    for(var k in _strageties){
        if(_strageties.hasOwnProperty(k)){
            var _name = k.substr(3).toLowerCase();
            if(_strageties[k]==1){
                for(i=0;i<config[_name].length;i++){
                    $('#'+k+i).val(config[_name][i]);
                }
            }else if(_strageties[k]==2){
                $('#'+k).val(config[_name]);
            }else{
                if((config[strageties1[k][0]] === null && typeof config[strageties1[k][0]] === "object")||(config[strageties1[k][0]] === "" && typeof config[strageties1[k][0]] === "string")
                        &&((config[strageties1[k][1]] === null && typeof config[strageties1[k][1]] === "object")||(config[strageties1[k][1]] === "" && typeof config[strageties1[k][1]] === "string"))){
                    $('#'+k).val('');
                }else{
                    $('#'+k).val(config[strageties1[k][0]]+ ":"+config[strageties1[k][1]]);
                }
            }
        }
        
    }
//    for(i=0;i<config['tx'].length;i++){
//        $('#vmsTx'+i).val(config['tx'][i]);
//    }
//    for(i=0;i<config['tsx'].length;i++){
//        $('#vmsTsx'+i).val(config['tsx'][i]);
//    }
//    for(i=0;i<config['tdbx'].length;i++){
//        $('#vmTdbx'+i).val(config['tdbx'][i]);
//    }
//    for(i=0;i<config['tsdbx'].length;i++){
//        $('#vmsTsdbx'+i).val(config['tsdbx'][i]);
//    }
//    $('#vmsStartTime').val(config['hour_on']+ ":"+config['minute_on']);
//    $('#vmsEndTime').val(config['hour_off']+ ":"+config['minute_off']);
//    $('#vmsFreq').val(config['freq']);
//    $('#vmsGt').val(config['gt']);
}

function setOtherConfig(config){
    var strageties = stragetiesOther;
    var strageties2 = stragetiesOther2;
    for(var k in strageties){
        if(strageties.hasOwnProperty(k)){
            if(strageties[k]==1){
                for(i=0;i<config['strageties'].length;i++){
                    $('#'+k+'['+i+']').val(config['strageties'][i]);
                }
            }else if(strageties[k]==2){
                $('#'+k).val(config[strageties1[k][0]]+ ":"+config[strageties1[k][1]]);
            }
        }
    }
}

