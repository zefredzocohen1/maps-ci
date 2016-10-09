function validateJson(a){
    if (/^[\],:{}\s]*$/.test(a.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, '')))return true
    else return false;
}
var strageties = ['vmsTx','vmsTsx','vmsTdbx','vmsTsdbx' ,'vmsFreq','vmsGt', 'vmsStartTime','vmsEndTime']
var strageties1 = {'vmsStartTime':['hour_on','minute_on'],'vmsEndTime':['hour_off','minute_off']}
function createArr(){
    var a=[]
  for(i=0;i<8;i++){
    a[i] = {hour_on:'',hour_off:'',minute_on:'',minute_off:'',freq:'',gt:'',tv:'',tx:['','','','','','','',''],tsx:['','','','','','','',''],tdbx:['','','','','','','',''],tsdbx:['','','','','','','','']};
  }
  return a;
}

function setValue(config){
    var _strageties = window.strageties;
    var _id = '';
    for(i=0;i<_strageties.length;i++){
        _id=_strageties[i].substring(4).toLowerCase();
        for(j=0;j<config[_id].length;j++){
            $('#'+_strageties[i]+j).val(config[_id][j]);
        }
        
    }
    for(i=0;i<config['tx'].length;i++){
        $('#vmsTx'+i).val(config['tx'][i]);
    }
    for(i=0;i<config['tsx'].length;i++){
        $('#vmsTsx'+i).val(config['tsx'][i]);
    }
    for(i=0;i<config['tdbx'].length;i++){
        $('#vmTdbx'+i).val(config['tdbx'][i]);
    }
    for(i=0;i<config['tsdbx'].length;i++){
        $('#vmsTsdbx'+i).val(config['tsdbx'][i]);
    }
    $('#vmsStartTime').val(config['hour_on']+ ":"+config['minute_on']);
    $('#vmsEndTime').val(config['hour_off']+ ":"+config['minute_off']);
    $('#vmsFreq').val(config['freq']);
    $('#vmsGt').val(config['gt']);
}

