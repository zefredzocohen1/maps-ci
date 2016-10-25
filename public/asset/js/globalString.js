function validateJson(a){
    if (/^[\],:{}\s]*$/.test(a.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, '')))return true
    else return false;
}
var strageties = ['vmsTx','vmsTsx','vmsTdbx','vmsTsdbx' , 'vmsTv','vmsFreq','vmsGt', 'vmsStartTime','vmsEndTime']
var strageties1 = {'vmsStartTime':['hour_on','minute_on'],'vmsEndTime':['hour_off','minute_off']}
var strageties2 = {'vmsTx':1,'vmsTsx':1,'vmsTdbx':1,'vmsTsdbx':1 , 'vmsTv':2,'vmsFreq':2,'vmsGt':2, 'vmsStartTime':3,'vmsEndTime':3};
var stragetiesOther = {vmsSectionDay:1,option1:2,option2:2,
    otherStartTime:3,otherEndTime:3,otherBlinkTime:3,
    otherAlpha:4};
var stragetiesOther2 = {'otherStartTime':['hour_on','minute_on'],otherEndTime:['hour_off','minute_off'],otherBlinkTime:['hour_blink','minute_blink']}
var chienluoconly = {hour_on:'',hour_off:'',minute_on:'',minute_off:'',freq:'',gt:'',tv:'3',tx:['','','','','','','',''],tsx:['','','','','','','',''],tdbx:['','','','','','','',''],tsdbx:['','','','','','','','']};
function createArr(){
    var a=[]
  for(i=0;i<8;i++){
    a[i] = chienluoconly;
  }
  return a;
}
function createChienLuoc(){
    var a = ['','','','','',''];
    for(i=0;i<6;i++){
        a[i] = [];
    }
}

function setStrageties(config){
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
                for( i =0;i< config[k].length;i++){
                    $('#'+k+"_"+i).val(config[k][i]);
                }
            }else if(strageties[k]==3){
                $('#'+k).val(config[strageties2[k][0]]+':'+config[strageties2[k][1]]);
            }
        }
    }
}

function toast(title,message,type){
    setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr[type](message, title);
    }, 300);
}

(function ($) {
     $.fn.extend({
       sidebarActive:function(option){
           var c = this;
           return this.each(function(){
               $(c).addClass('active');
               var link = $(c).find('li a');
               if(link.attr(' data-choose')){
                   
               }
           });
       }  
     })
})(jQuery);

(function ($) {
     $.fn.extend({
         validateTragete:function(option){
            var c = this;
            var v = option;
            var arr = [];
             $('.'+v).each(function(){
                 if($(this).val()!=''){
                     arr.push($(this).val())
                 }
             });

           return this.each(function(){
               $('.vms-select-input').each(function(){
                   arr.push($(this).val());
               })
               if(arr.length==0&&arr.length==36){
                   toast('Nhập dữ liệu','Nhập hợp lên','success');
               }else{
                   toast('Nhập dữ liệu','Nhập lỗi','error')
               }
           });
       }  
     })
    $.fn.extend({
        validateNumber:function(){
            var c = this,value = $(c).val();
            if(parseInt(value)<0||parseInt(value)>255||!(Math.floor(value)&&$.isNumeric(value))){
                toast('nhập sai dữ liệu','Dữ liệu phải là số từ 1 ->8','error');
            }
            // kiểm tra class vms-select-input
            // 1 nhập toàn bộ
            // null toàn bộ
        }
    });
})(jQuery);

