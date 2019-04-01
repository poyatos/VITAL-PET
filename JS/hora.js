
  var tick;
 function stop() {
   clearTimeout(tick);
   }
 function simple_reloj() {
   var ut=new Date();
   var h,m,s;
   var time="        ";
   h=ut.getHours();
   m=ut.getMinutes();
   s=ut.getSeconds();
   if(s<=9) s="0"+s;
  if(m<=9) m="0"+m;
  if(h<=9) h="0"+h;
  time+=h+":"+m+":"+s;
  document.getElementById('reloj').innerHTML=time;
  tick=setTimeout("simple_reloj()",1000);
  }

