<?php
  include('../../config.php');
  date_default_timezone_set('Asia/Manila');
  session_start();

  $Rno = $_GET['R'];

  $EventInfoSQL = 'SELECT IFNULL(tbl_t_registration.Registration_No,"") AS Registration_No,
                          IFNULL(tbl_t_event.Event_Title,"") AS Event_Title,
                          IFNULL(tbl_t_event.Event_CPD,"") AS Event_CPD,
                          IFNULL(tbl_t_event.Event_Date,"") AS Event_Date,
                          IFNULL(tbl_t_event.Event_Phases,"") AS Event_Phases,
                          IFNULL(DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY),"") AS End_Date,
                          IFNULL(tbl_t_event.Event_Location,"") AS Event_Location,
                          IFNULL(tbl_t_event.Event_Price,"") AS Event_Price,
                          IFNULL(tbl_t_registrant.Registrant_ID,"") AS Registrant_ID,
                          IFNULL(tbl_t_registrant.First_Name,"") AS First_Name,
                          IFNULL(tbl_t_registrant.Middle_Name,"") AS Middle_Name,
                          IFNULL(tbl_t_registrant.Last_Name,"") AS Last_Name,
                          IFNULL(tbl_t_registrant.Ext_Name,"") AS Ext_Name
                  FROM    tbl_t_registration
                  INNER JOIN tbl_t_registrant
                    ON tbl_t_registration.Registrant_ID = tbl_t_registrant.Registrant_ID
                  INNER JOIN tbl_t_event
                    ON tbl_t_registration.Event_ID = tbl_t_event.Event_ID
                  WHERE tbl_t_registration.Registration_No = '.$Rno.' ';
  $EventInfo = mysqli_query($euceventMysqli,$EventInfoSQL) or die(mysqli_error($euceventMysqli));
  if(mysqli_num_rows($EventInfo) > 0)
    {
      while($row = mysqli_fetch_assoc($EventInfo))
      {
        $RNo = $row['Registration_No'];
        $Title = $row['Event_Title'];
        $CPD = $row['Event_CPD'];
        $Date = $row['Event_Date'];
        $EDate = $row['End_Date'];
        $Phases = $row['Event_Phases'];
        $Location = $row['Event_Location'];
        $RID = $row['Registrant_ID'];
        $FName = $row['First_Name'];
        $MName = $row['Middle_Name'];
        $LName = $row['Last_Name'];
        $XName = $row['Ext_Name'];
      }
    }
?>
<!DOCTYPE html>
<html class="nojs html" lang="en-US">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2018.1.0.386"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <script type="text/javascript" src="../../bower_components/jquery/dist/jquery.js"></script>
  <script type="text/javascript" src="../../bower_components/qr/qrcode.js"></script>
  <script type="text/javascript" src="../../bower_components/qr/jquery.qrcode.min.js"></script>

  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "require.js", "index.css"], "outOfDate":[]};
</script>
  
  <title>Attendance Cert</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?crc=148553253" id="pagesheet"/>
   </head>
 <body onload="window.print();">

  <div class="clearfix borderbox" id="page"><!-- group -->
   <div class="clip_frame grpelem" id="u94"><!-- image -->
    <img class="block" id="u94_img" src="images/cropped-1609985_213429445534543_1551613776_n-150x150-crop-u94.jpg?crc=515745952" alt="" data-heightwidthratio="0.964110929853181" data-image-width="613" data-image-height="591"/>
   </div>
   <div class="clearfix grpelem" id="u104-4"><!-- content -->
    <p>Attendance Record</p>
   </div>
   <div class="clearfix grpelem" id="u107-4"><!-- content -->
    <p>This document confirms that</p>
   </div>
   <div class="clearfix grpelem" id="u110-4"><!-- content -->
    <p><?php echo(''.$FName.' '.$MName.' '.$LName.' '.$XName.' '); ?></p>
   </div>
   <div class="clearfix grpelem" id="u113-4"><!-- content -->
    <p>Has attended the</p>
   </div>
   <div class="clearfix grpelem" id="u116-4"><!-- content -->
    <p><?php echo $Title; ?></p>
   </div>
   <div class="clearfix grpelem" id="u119-4"><!-- content -->
    <p>This attendance is valid for&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Continuing Professional Development (CPD) credits.</p>
   </div>
   <div class="clearfix grpelem" id="u122-4" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
    <p><?php echo $CPD; ?></p>
   </div>
   <div class="clearfix grpelem" id="u125-4"><!-- content -->
    <p>Held at:</p>
   </div>
   <div class="clearfix grpelem" id="u132-4"><!-- content -->
    <p>Course Completion Date:</p>
   </div>
   <div class="clearfix grpelem" id="u135-4"><!-- content -->
    <p><?php echo $Location; ?></p>
   </div>
   <div class="clearfix grpelem" id="u138-4"><!-- content -->
    <p><?php echo $EDate; ?></p>
   </div>
   <div class="clearfix grpelem" id="u156-19"><!-- content -->
    <p id="u156-2">EUC</p>
    <p>Electronic Financials Users’</p>
    <p>&nbsp;&nbsp;&nbsp; Circle, Inc.</p>
    <p>Unit 909 The One Executive</p>
    <p>&nbsp;&nbsp;&nbsp; Building No. 5 West</p>
    <p>&nbsp;&nbsp;&nbsp; Avenue, Quezon City</p>
    <p>(02) 412-1117</p>
    <p>euc.inc@gmail.com</p>
    <p>&nbsp;</p>
   </div>
   <div class="clip_frame grpelem" id="u162"><!-- image -->
    <img class="block" id="u162_img" src="images/signature_sample.jpg?crc=3909949887" alt="" data-heightwidthratio="0.37333333333333335" data-image-width="225" data-image-height="84"/>
   </div>
   <div class="clearfix grpelem" id="u150-4"><!-- content -->
    <p>Carmela S. Perez</p>
   </div>
   <div class="clearfix grpelem" id="u153-4"><!-- content -->
    <p>EUC President</p>
   </div>
   <div class="clip_frame grpelem" id="u332"><!-- image -->
    <!-- <img class="block" id="u332_img" src="images/qr-crop-u332.jpg?crc=300529930" alt="" data-heightwidthratio="0.9064748201438849" data-image-width="139" data-image-height="126"/> -->
    <div id="qrCanvass">
    
    </div>
    <script>
      jQuery('#u332').qrcode({                      
      text  : <?php echo "'".$RNo.$LName.$RID."'";?>,
      width : 100,
      height: 100,
      }); 
    </script>
   </div>
  </div>
  <!-- Other scripts -->


  <script type="text/javascript">
   // Decide whether to suppress missing file error or not based on preference setting
var suppressMissingFileError = false
</script>
  <script type="text/javascript">
   window.Muse.assets.check=function(c){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},d=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},f=function(f){for(var g=document.getElementsByTagName("link"),j=0;j<g.length;j++)if("text/css"==g[j].type){var l=(g[j].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!l||!l[1]||!l[2])break;b[l[1]]=l[2]}g=document.createElement("div");g.className="version";g.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(g);for(j=0;j<Muse.assets.required.length;){var l=Muse.assets.required[j],k=l.match(/([\w\-\.]+)\.(\w+)$/),i=k&&k[1]?
k[1]:null,k=k&&k[2]?k[2]:null;switch(k.toLowerCase()){case "css":i=i.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");g.className+=" "+i;i=a(d(g,"color"));k=a(d(g,"backgroundColor"));i!=0||k!=0?(Muse.assets.required.splice(j,1),"undefined"!=typeof b[l]&&(i!=b[l]>>>24||k!=(b[l]&16777215))&&Muse.assets.outOfDate.push(l)):j++;g.className="version";break;case "js":j++;break;default:throw Error("Unsupported file type: "+k);}}c?c().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
g.parentNode.removeChild(g);if(Muse.assets.outOfDate.length||Muse.assets.required.length)g="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",f&&Muse.assets.outOfDate.length&&(g+="\nOut of date: "+Muse.assets.outOfDate.join(",")),f&&Muse.assets.required.length&&(g+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(g+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(g)):alert(g)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){f(!0)},5E3):f()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput"],function(c){var $ = c;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.makeButtonsVisibleAfterSettingMinWidth();/* body */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=7928878" type="text/javascript" async data-main="scripts/museconfig.js?crc=310584261" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
