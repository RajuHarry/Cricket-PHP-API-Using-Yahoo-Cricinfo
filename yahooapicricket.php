<div id="matches"></div>
<script>
  var ONLY_SHOW_MATCH_FOR = "";
  function getScore(data){
    var matches = data.query.results.mchdata.match;
    for(var i=0;i<matches.length;i++){
      if(matches[i].mchDesc.indexOf(ONLY_SHOW_MATCH_FOR)>=0){
        document.getElementById("matches").innerHTML+="<div>"+matches[i].mchDesc+"</div>";
        if(isNotUndefined(matches[i].mnum)){
          document.getElementById("matches").innerHTML+=matches[i].mnum;
        }
        if(isNotUndefined(matches[i].srs)){
          document.getElementById("matches").innerHTML+=", "+matches[i].srs;
        }
        if(isNotUndefined(matches[i].grnd)){
          document.getElementById("matches").innerHTML+="<div id='grnd"+i+"'>"+matches[i].grnd+"</div>";
        }
        if(isNotUndefined(matches[i].vcity)){
          document.getElementById("grnd"+i).innerHTML+=", "+matches[i].vcity;
        }
        if(matches[i].type.toLowerCase()=="Test".toLowerCase()){
          if(isNotUndefined(matches[i].mscr) && isNotUndefined(matches[i].mscr.btTm) && isNotUndefined(matches[i].mscr.btTm.Inngs)){
              document.getElementById("matches").innerHTML+="<div id='btTm"+i+"'><b>"+matches[i].mscr.btTm.sName+": </b></div>";
              for(var j=0;j<matches[i].mscr.btTm.Inngs.length;j++){
                document.getElementById("btTm"+i).innerHTML+= matches[i].mscr.btTm.Inngs[j].desc+" -> ";
                document.getElementById("btTm"+i).innerHTML+= matches[i].mscr.btTm.Inngs[j].r;
                document.getElementById("btTm"+i).innerHTML+= "/"+matches[i].mscr.btTm.Inngs[j].wkts;
                document.getElementById("btTm"+i).innerHTML+= " ("+matches[i].mscr.btTm.Inngs[j].ovrs+")"+"<br/>";
                
              }
          }
            if(isNotUndefined(matches[i].mscr) && isNotUndefined(matches[i].mscr.blgTm) && isNotUndefined(matches[i].mscr.blgTm.Inngs)){
              document.getElementById("matches").innerHTML+="<div id='blgTm"+i+"'><b>"+matches[i].mscr.blgTm.sName+": </b></div>";
              for(var j=0;j<matches[i].mscr.btTm.Inngs.length;j++){
                document.getElementById("blgTm"+i).innerHTML+= matches[i].mscr.blgTm.Inngs[j].desc+" -> ";
                document.getElementById("blgTm"+i).innerHTML+= matches[i].mscr.blgTm.Inngs[j].r;
                document.getElementById("blgTm"+i).innerHTML+= "/"+matches[i].mscr.blgTm.Inngs[j].wkts;
                document.getElementById("blgTm"+i).innerHTML+= " ("+matches[i].mscr.blgTm.Inngs[j].ovrs+")"+"<br/>";
              }

            }
        }
        else{
          if(isNotUndefined(matches[i].mscr) && isNotUndefined(matches[i].mscr.btTm) && isNotUndefined(matches[i].mscr.btTm.Inngs)){
            document.getElementById("matches").innerHTML+="<div id='btTm"+i+"'><b>"+matches[i].mscr.btTm.sName+": </b></div>";
            document.getElementById("btTm"+i).innerHTML+= matches[i].mscr.btTm.Inngs.r;
            document.getElementById("btTm"+i).innerHTML+= "/"+matches[i].mscr.btTm.Inngs.wkts;
            document.getElementById("btTm"+i).innerHTML+= " ("+matches[i].mscr.btTm.Inngs.ovrs+")";
          }
          if(isNotUndefined(matches[i].mscr) && isNotUndefined(matches[i].mscr.blgTm) && isNotUndefined(matches[i].mscr.blgTm.Inngs)){
            document.getElementById("matches").innerHTML+="<div id='blgTm"+i+"'><b>"+matches[i].mscr.blgTm.sName+": </b></div>";
            document.getElementById("blgTm"+i).innerHTML+= matches[i].mscr.blgTm.Inngs.r;
            document.getElementById("blgTm"+i).innerHTML+= "/"+matches[i].mscr.blgTm.Inngs.wkts;
            document.getElementById("blgTm"+i).innerHTML+= " ("+matches[i].mscr.blgTm.Inngs.ovrs+")";
          }
        }
        if(isNotUndefined(matches[i].state) && isNotUndefined(matches[i].state.status)){
          document.getElementById("matches").innerHTML+="<div>"+matches[i].state.status+"</div>";
        }
        document.getElementById("matches").innerHTML+="<a href='http://www.cricbuzz.com/cricket-match/live-scores' target='_blank'>See details</a>";
        document.getElementById("matches").innerHTML+="<hr/>";
      }
    }
  }
  function isNotUndefined(val){
    if(val!=undefined && val!=null)
      return true;
    else
      return false;
  }
</script>

<script src="https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20xml%20where%20url%3D%22http%3A%2F%2Fsynd.cricbuzz.com%2Fj2me%2F1.0%2Flivematches.xml%22&format=json&callback=getScore"></script>