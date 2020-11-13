<?php

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$browser = $_SERVER['HTTP_USER_AGENT'];

if (!empty($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];
} else {
    $referer = "Direct URL";
}

if (!empty($_GET['ref'])) {
    $source = $_GET['ref'];
} else {
    $source = "No Ref Tag";
}

$page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http").'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

function dnt_enabled() {
   return (isset($_SERVER['HTTP_DNT']) && $_SERVER['HTTP_DNT'] == 1);
}

if (dnt_enabled()) {
    $dnt = 1;
} else {
    $dnt = 0;
}

$ip = urlencode($ip);
$browser = urlencode($browser);
$referer = urlencode($referer);
$source = urlencode($source);
$page = urlencode($page);

$json = file_get_contents("https://miniurl.id/tools/off-site-analytics?ip=".$ip."&browser=".$browser."&referrer=".$referer."&ref=".$source."&page=".$page."&dnt=".$dnt);
$array = json_decode($json);
$status = $array->status;
if (substr($status, 0, 7) == "success") {
    $input = "success";
} else {
    $input = "failed";
}

$host = $_SERVER['HTTP_HOST'];
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$latest_gg_ver = file_get_contents('https://latest-goguardian-version.miniurl.repl.co/');
$latest_gg_sc = "https://robwu.nl/crxviewer/?crx=".urlencode($latest_gg_ver);

echo '<!-- Status: '.$input.' -->
';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="robots" content="none" />
        <meta name="googlebot" content="none" />
        <link rel="icon" type="image/png" href="https://miniurl.id/assets/logo/unrestrict.png">
        <title>Unrestrict | Websites and Chromebook Restrictions Unblocker</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1" />
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                margin: 0;
            }
            p {
                display:none;
            }
            #home_logo {
                width: 250px;
                height: 250px;
            }
            .bgcolor {
                background-color: #222222;
            }
            h1, h2, h3, h4, h5, a, label {
                color: white;
            }
            .barbutton {
                background-color: #f2f2f2;
                border: none;
                color: #000000;
                padding: 15px 32px;
                text-align: center;
                text-decoration: bold;
                display: inline-block;
                font-size: 14px;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 15px;
            }
            .barbutton:hover {
                color: #ffffff;
                background-color: #66ad57;
            }
            .clickable {
                cursor: pointer;
            }
            #search_form_homepage {
                max-width: 750px;
            }
            .tabunrestrict {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
                /*
                max-width: 100vw;
                */
            }
            
            .tabunrestrict button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }
            
            .tabunrestrict button:hover {
                background-color: #ddd;
            }
            
            .tabunrestrict button.active {
                background-color: #ccc;
            }
            
            .tabcontentunrestrict {
                display: none;
                padding: 6px 12px;
                border: 1px solid #fff;
                border-top: none;
            }
            .selection {
                max-width: 750px;
            }
            
            .columnforimg {
                float: left;
                width: 25%;
                padding: 10px;
            }

            .columnforimg img {
                opacity: 0.8; 
                cursor: pointer; 
            }

            .columnforimg img:hover {
                opacity: 1;
            }

            .rowforimg:after {
                content: "";
                display: table;
                clear: both;
            }

            .containerforexpandedImg {
                position:relative;
                width:100%;
                height:100%;
                top:0;
                bottom:0;
                left:0;
                right:0;
                display:none;
            }
            #imgtext {
                position: absolute;
                bottom: 15px;
                right: 15px;
                color: white;
                font-size: 20px;
                background-color: black;
            }
            .closebtn {
                position: absolute;
                top: 10px;
                right: 15px;
                color: black;
                font-size: 35px;
                cursor: pointer;
            }
        </style>
        <link rel="stylesheet" href="https://miniurl.id/css/s1912.css" type="text/css">
        <link rel="stylesheet" href="https://miniurl.id/css/o1912.css" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class="bgcolor">
        <center class="bgcolor">
            <a href="/">
            <img src="https://miniurl.id/assets/logo/unrestrict.png" alt="Unrestrict" title="Unrestrict" id="home_logo" draggable="false">
            </a>
            <p>Unrestricted: freely available for use or participation by all it's an unrestricted marathon—anyone can run in it Synonyms for unrestricted free-for-all, open, public Words Related to unrestricted collective, common, communal, shared accessible, available, free unregulated, unreserved Near Antonyms for unrestricted limited inaccessible, unavailable Antonyms for unrestricted closed, exclusive, off-limits, private, restricted 2not bound by rigid standards the author of the book has an unrestricted view of what qualifies as "art" Synonyms for unrestricted easygoing, flexible, lax, loose, relaxed, slack, unrestrained Words Related to unrestricted careless, derelict, heedless, irresponsible, lazy, neglectful, negligent, remiss, slipshod, sloppy, sloven, slovenly, unfussy Near Antonyms for unrestricted constrained, restrained, restricted, tight careful, conscientious, exact, fussy, meticulous, painstaking, punctilious, scrupulous implacable, inflexible Antonyms for unrestricted hard, harsh, rigid, rigorous, severe, stern, strict 3not limited or specialized in application or purpose an unrestricted license to operate a motor vehicle Synonyms for unrestricted all-around (also all-round), all-purpose, catholic, general, general-purpose, unlimited, unqualified, unspecialized Words Related to unrestricted mixed-use, multipurpose broad, wide nonspecific, unspecified, vague Near Antonyms for unrestricted bounded, circumscribed, confined, definite, demarcated, determinate, finite, qualified dedicated, selective Antonyms for unrestricted limited, restricted, specialized, technical</p>
            <h2>Unrestrict | Websites and Chromebook Restrictions Unblocker</h2>
            <label>Unrestrict Servers List</label><br>
            <a href="http://unrestrict.rf.gd/?ref=github_php" target="_blank" class="barbutton">http://unrestrict.rf.gd</a>
            <a href="http://unrestrict.xyz/?ref=github_php" target="_blank" class="barbutton">http://unrestrict.xyz</a>
            <a href="http://unrestrict.online/?ref=github_php" target="_blank" class="barbutton">http://unrestrict.online</a><br>
            <label>Secure Unrestrict Servers List</label><br>
            <a href="https://un-r.estrict.repl.co/?ref=github_php" target="_blank" class="barbutton">https://un-r.estrict.repl.co</a>
            <a href="https://unr.estrict.repl.co" target="_blank" class="barbutton">https://unr.estrict.repl.co</a>
            <a href="https://unrestrict.miniurl.id/?ref=github_php" target="_blank" class="barbutton">https://unrestrict.miniurl.id/</a><br>
            <label>Untraceable Unrestrict Server</label><br>
            <button onclick="document.getElementById('unrestrictAlternative').submit()" class="barbutton">Open in new tab</button><br>
            <label>Select to copy URl:</label><br>
            <input type="text" value="https://miniurl.id/u" title="Select to copy" style="background-color:#ffffff;" onfocus="copyText(this.value);this.select();document.getElementById('uucu').innerHTML = 'Copied!';">
            <label id="uucu"></label><br>
            <label>Unrestrict Source Code</label><br>
            <a href="https://github.com/Nimityx/unrestrict" target="_blank" class="barbutton">https://github.com/Nimityx/unrestrict</a><br><br>
	    <label>Watch Proxy</label><br>
	    <button onclick="document.getElementById('watchproxy').submit()" class="barbutton">Open in new tab</button><br>
            <label>Select to copy URl:</label><br>
            <input type="text" value="https://miniurl.id/w" title="Select to copy" style="background-color:#ffffff;" onfocus="copyText(this.value);this.select();document.getElementById('wpcu').innerHTML = 'Copied!';">
            <label id="wpcu"></label><br><br>
            <label>Unrestrict Contents</label><br>
            <a href="#website" class="barbutton">Websites Unblocker</a><br>
            <a href="#iframe-browser" class="barbutton">Iframe</a>
            <a href="#Off-site-Proxy" class="barbutton">Off-site proxy</a>
            <a href="#VM_Emulator_Browser-in-browser" class="barbutton">Virtual Machine, Emulator & Browser-in-browser</a>
            <a href="#alternatives" class="barbutton">Web Alternatives</a>
            <a href="#games" class="barbutton">Games</a><br><br>
            <a href="#chromebook" class="barbutton">Chromebook Restrictions Unblocker</a><br>
            <a href="#chrome_policy" class="barbutton">chrome://policy</a>
            <a href="#goguardian" class="barbutton">GoGuardian</a><br><br><br>
            <a title="Click to copy" onclick="copyText('<?php echo $protocol; ?>://<?php echo $host; ?>/#website'); return false" href="/#website" id="website"><h2>Websites Unblocker</h2></a>
            <iframe id="frame" name="main_frame" style="display:none" frameborder="0" width="750" height="421.875" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true" mozallowfullscreen="true" msallowfullscreen="true" oallowfullscreen="true" webkitallowfullscreen="true"></iframe>
            <button style="display:none" id="buttonframe1" onclick="fullScreenRequest('frame')" class="barbutton" title="Fullscreen"><i class="material-icons" style="font-size: 10px">fullscreen</i></button>
            <button style="display:none" id="buttonframe2" onclick="clearIframe()" class="barbutton" title="Clear Iframe"><i class="material-icons" style="font-size: 10px">clear</i></button>
            <h4 id="iframe-browser">Access website on Iframe</h4>
            <form id="search_form_homepage" class="search--home  js-search-form search--adv" name="x" action="/" method="POST">
            <input required id="urlinput" type="url" class="js-search-input search__input--adv" autocomplete="off" tabindex="1" value="https://en.wikipedia.org" autocapitalize="off" autocorrect="off" placeholder="Enter URL here">
            <input id="search_button_homepage" class="search__button  js-search-button" type="submit" tabindex="2" value="S">
            </form>
            <br>
            <h4 id="Off-site-Proxy">Off-site Proxy</h4>
            <div class="selection">
                <div class="tabunrestrict">
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Alloy')">Alloy</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Powermouse')">Powermouse</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'PyDodge')">PyDodge</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Nodeunblocker')">Node Unblocker</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Gtranslate')">Google Translate</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Proxysite')">Proxysite</button>
                    <!--
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Kproxy')">Kproxy</button>
                    -->
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Hideme')">Hide.me</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Getbehindme')">Getbehind.me</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Fileproxy')">File Proxy</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Cachedview')">Cached Sites</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Imageproxy')">Image Proxy</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Videoproxy')">Video Proxy</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Watchproxy')">Watch Proxy</button>
                </div>
                <div id="Alloy" class="tabcontentunrestrict">
                    <h3>Alloy Proxy</h3>
                    <label>1. (https://alloyproxy.miniurl.repl.co)</label>
                    <form method="POST" action="https://alloyproxy.miniurl.repl.co/proxy/session/" target="_blank">
                    <input required placeholder="Enter URL" name="url" type="text" value="https://" autocomplete="off" autocapitalize="off" autocorrect="off">
                    <button type="submit">Go!</button>
                    </form>
                    <label>2. (https://titaniumnetwork.miniurl.repl.co)</label>
                    <form action="https://titaniumnetwork.miniurl.repl.co/createSession" method="post" target="_blank">
                    <input required placeholder="Enter URL" type="url" name="url" value="https://" autocomplete="off" autocapitalize="off" autocorrect="off">
                    <button type="submit">Go!</button>
                    </form>
                    <label>3. (https://papercompany.ga) (Broken . . .)</label>
                    <form action="https://papercompany.ga/prox/" method="post" target="_blank">
                    <input required placeholder="Enter URL" type="url" name="url" value="https://" autocomplete="off" autocapitalize="off" autocorrect="off">
                    <button name="prox_type" value="al" type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="Powermouse" class="tabcontentunrestrict">
                    <h3>Powermouse</h3>
                    <label>1. (https://papercompany.ga) (Broken . . .)</label>
                    <form action="https://papercompany.ga/prox/" method="post" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <button name="prox_type" value="pm" type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="PyDodge" class="tabcontentunrestrict">
                    <h3>PyDodge</h3>
                    <label>1. (https://papercompany.ga) (Broken . . .)</label>
                    <form action="https://papercompany.ga/prox/" method="post" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <button name="prox_type" value="pd" type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="Nodeunblocker" class="tabcontentunrestrict">
                    <h3>Node Unblocker</h3>
                    <label>1. (https://noderlol.herokuapp.com)</label>
                    <form action="https://miniurl.id/norobots/formattedredirector" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <input type="hidden" name="type" value="nu">
                    <button type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="Gtranslate" class="tabcontentunrestrict">
                    <h3>Google Translate Proxy</h3>
                    <form action="https://translate.google.com/translate" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="u" value="https://">
                    <input type="hidden" name="hl" value="en">
                    <input type="hidden" name="sl" value="">
                    <input type="hidden" name="tl" value="en">
                    <button type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="Proxysite" class="tabcontentunrestrict">
                    <h3>Proxysite.com</h3>
                    <form id="proxysiteform" action="https://us11.proxysite.com/includes/process.php?action=update" method="post" class="url-form" target="_blank">
                    <input id="url-form" placeholder="Enter Url" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" name="d" value="https://"><br>
                    <select id="server-option" name="server-option">
                    <option value="us11" selected="selected">US Server</option>
                    <option value="eu8">EU Server</option>
                    <option value="us1">US1</option>
                    <option value="us2">US2</option>
                    <option value="us3">US3</option>
                    <option value="us4">US4</option>
                    <option value="us5">US5</option>
                    <option value="us6">US6</option>
                    <option value="us8">US8</option>
                    <option value="us9">US9</option>
                    <option value="us10">US10</option>
                    <option value="us11">US11</option>
                    <option value="us12">US12</option>
                    <option value="us13">US13</option>
                    <option value="us14">US14</option>
                    <option value="us15">US15</option>
                    <option value="us16">US16</option>
                    <option value="us17">US17</option>
                    <option value="eu1">EU1</option>
                    <option value="eu2">EU2</option>
                    <option value="eu3">EU3</option>
                    <option value="eu4">EU4</option>
                    <option value="eu5">EU5</option>
                    <option value="eu6">EU6</option>
                    <option value="eu7">EU7</option>
                    <option value="eu8">EU8</option>
                    <option value="eu9">EU9</option>
                    <option value="eu10">EU10</option>
                    <option value="eu11">EU11</option>
                    <option value="eu12">EU12</option>
                    </select>
                    <br><button type="submit">Go!</button>
                    </form>
                    <br>
                </div>
		<!--
                <div id="Kproxy" class="tabcontentunrestrict">
                    <h3>Kproxy.com</h3>
                    <label>1. (http://kproxy.com)</label>
                    <form method="POST" action="http://kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>2. (http://167.114.102.230/)</label>
                    <form method="POST" action="http://167.114.102.230/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>3. (http://hidedoor.com)</label>
                    <form method="POST" action="http://hidedoor.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>4. (http://server1.kproxy.com)</label>
                    <form method="POST" action="http://server1.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>5. (http://server2.kproxy.com)</label>
                    <form method="POST" action="http://server2.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>6. (http://server3.kproxy.com)</label>
                    <form method="POST" action="http://server3.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>7. (http://server4kproxy.com)</label>
                    <form method="POST" action="http://server4.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>8. (http://server5.kproxy.com)</label>
                    <form method="POST" action="http://server5.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>9. (http://server6.kproxy.com)</label>
                    <form method="POST" action="http://server6.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>10. (http://server7.kproxy.com)</label>
                    <form method="POST" action="http://server7.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>11. (http://server8.kproxy.com)</label>
                    <form method="POST" action="http://server8.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form>
                    <label>12. (http://server9.kproxy.com)</label>
                    <form method="POST" action="http://server9.kproxy.com/doproxy.jsp" target="_blank">
                    <input value="https://" placeholder="Enter Url" name="page" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit">Go!</button>
                    </form><br>
                </div>
		-->
                <div id="Hideme" class="tabcontentunrestrict">
                    <h3>Hide.me Proxy</h3>
                    <form method="post" id="hidemeform" action="https://nl.hideproxy.me/includes/process.php?action=update" target="_blank">
                    <input name="u" placeholder="Enter web address" value="https://" required autocomplete="off" autocapitalize="off" autocorrect="off" >
                    <button type="submit" name="go">Go</button><br>
                    <input type="radio" id="nl" name="proxy_formdata_server" value="nl" onclick="servernl();" checked class="clickable"><label for="nl" class="clickable"><img src="https://hide.me/resources/286/images/flags/26/netherlands.png" alt="Netherlands"> Netherlands</label><br>
                    <input type="radio" id="de" name="proxy_formdata_server" value="de" onclick="serverde();" class="clickable"><label for="de" class="clickable"><img src="https://hide.me/resources/286/images/flags/26/germany.png" alt="Germany"> Germany</label><br>
                    <input type="radio" id="fi" name="proxy_formdata_server" value="fi" onclick="serverfi();" class="clickable"><label for="fi" class="clickable"><img width="26" height="22" src="https://hide.me/resources/286/images/flags/svg/fi.svg" alt="Finland"> Finland</label><br>
                    <input type="checkbox" id="allowcookies" name="allowCookies" value="1" checked class="clickable">
                    <label for="allowcookies" class="clickable"> Allow Cookies</label><br>
                    <input type="checkbox" id="encodeURL" name="encodeURL" value="1" checked class="clickable">
                    <label for="encodeURL" class="clickable"> Encrypt URL</label><br>
                    <input type="checkbox" id="encodePage" name="encodePage" value="1" class="clickable">
                    <label for="encodePage" class="clickable"> Encrypt Page</label><br>
                    <input type="checkbox" id="stripObjects" name="stripObjects" value="1" class="clickable">
                    <label for="stripObjects" class="clickable"> Remove Scripts</label><br>
                    <input type="checkbox" id="stripJS" name="stripJS" value="1" class="clickable">
                    <label for="stripJS" class="clickable"> Remove Objects</label>
                    </form>
                    <br>
                </div>
                <div id="Getbehindme" class="tabcontentunrestrict">
                    <h3>Getbehind.me</h3>
                    <form action="https://us1-web.getbehind.me/includes/process.php?action=update" method="post" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="u" value="https://">
                    <input type="submit" value="Go"><br>
                    <input type="checkbox" name="encodeURL" id="encodeURLonproxy" checked="checked" class="clickable"><label for="encodeURLonproxy" class="clickable">Encrypt URL</label><br>
                    <input type="checkbox" name="encodePage" id="encodePageonproxy" class="clickable"><label for="encodePageonproxy" class="clickable">Encrypt Page</label><br>
                    <input type="checkbox" name="allowCookies" id="allowCookiesfromproxy" checked="checked" class="clickable"><label for="allowCookiesfromproxy" class="clickable">Allow Cookies</label><br>
                    <input type="checkbox" name="stripJS" id="stripJSonproxy" checked="checked" class="clickable"><label for="stripJSonproxy" class="clickable">Remove Scripts</label><br>
                    <input type="checkbox" name="stripObjects" id="stripObjectsonproxy" checked="checked" class="clickable"><label for="stripObjectsonproxy" class="clickable">Remove Objects</label><br>
                    </form>
                </div>
                <div id="Fileproxy" class="tabcontentunrestrict">
                    <h3>File Proxy</h3>
                    <label>1. (https://fileproxy.miniurl.repl.co/)</label>
                    <form action="https://fileproxy.miniurl.repl.co/" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <button type="submit">Go!</button>
                    </form>
                    <label>2. (https://miniurlid.000webhostapp.com/app/fileproxy)</label>
                    <form action="https://miniurlid.000webhostapp.com/app/fileproxy" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <button type="submit">Go!</button>
                    </form>
                    <label>3. (https://miniurl.id/norobots/fileproxy)</label>
                    <form action="https://miniurl.id/norobots/fileproxy" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <button type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="Cachedview" class="tabcontentunrestrict">
                    <h3>Cahedview.com</h3>
                    <label>1. Google Cached View</label>
                    <form action="https://miniurl.id/norobots/formattedredirector" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <input type="hidden" name="type" value="cg">
                    <button type="submit">Go!</button>
                    </form>
                    <label>2. Internet Archive's Webarchive</label>
                    <form action="https://miniurl.id/norobots/formattedredirector" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <input type="hidden" name="type" value="ci">
                    <button type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="Imageproxy" class="tabcontentunrestrict">
                    <h3>Image Proxy</h3>
                    <label>1. (https://external-content.duckduckgo.com/)</label>
                    <form action="https://external-content.duckduckgo.com/iu/" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="u" value="https://">
                    <input type="hidden" name="f" value="1">
                    <button type="submit">Go!</button>
                    </form>
                    <label>2. (https://imageproxy.miniurl.repl.co/)</label>
                    <form action="https://imageproxy.miniurl.repl.co/" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <button type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="Videoproxy" class="tabcontentunrestrict">
                    <h3>Video Proxy</h3>
                    <label>1. (https://videoproxy.miniurl.repl.co/)</label>
                    <form action="https://videoproxy.miniurl.repl.co/" method="get" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="https://">
                    <button type="submit">Go!</button>
                    </form><br>
                    <h3>Youtube Video Proxy</h3>
                    <label>1. (https://miniurl.id/norobots/youtubeplayer)</label>
                    <form action="https://miniurl.id/norobots/youtubeplayer" method="POST" target="_blank">
                    <input placeholder="Enter URL" type="url" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="">
                    <button type="submit">Go!</button>
                    </form>
                    <br>
                </div>
                <div id="Watchproxy" class="tabcontentunrestrict">
                    <h3 title="This proxy doesn't leave history">Secure, Non-traceable Watch Proxy</h3>
                    <form action="https://miniurl.id/norobots/edpuzzle?page=watch" method="POST" target="_blank">
                    <input placeholder="Enter requested value" type="text" required autocomplete="off" autocapitalize="off" autocorrect="off" name="url" value="">
                    <button type="submit">Go!</button><br>
                    <input type="radio" class="clickable" name="type" value="yt01" id="yt01" checked><label for="yt01" class="clickable"> Youtube 1 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="yt02" id="yt02"><label for="yt02" class="clickable"> Youtube 2 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="yt03" id="yt03"><label for="yt03" class="clickable"> Youtube 3 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="yt04" id="yt04"><label for="yt04" class="clickable"> Youtube 4 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="yt05" id="yt05"><label for="yt05" class="clickable"> Youtube 5 (Search query)</label><br>
                    <input type="radio" class="clickable" name="type" value="ig" id="ig"><label for="ig" class="clickable"> Instagram (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="fb" id="fb"><label for="fb" class="clickable"> Facebook (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="tw" id="tw"><label for="tw" class="clickable"> Twitter (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="tt1" id="tt1"><label for="tt1" class="clickable"> Tiktok 1 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="tt2" id="tt2"><label for="tt2" class="clickable"> Tiktok 2 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="gd1" id="gd1"><label for="gd1" class="clickable"> GDrive 1 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="gd2" id="gd2"><label for="gd2" class="clickable"> GDrive 2 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="gp" id="gp"><label for="gp" class="clickable"> GPhotos (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="ntv" id="ntv"><label for="ntv" class="clickable"> Naver TV (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="vlive" id="vlive"><label for="vlive" class="clickable"> Vlive (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="vm1" id="vm1"><label for="vm1" class="clickable"> Vimeo 1 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="vm2" id="vm2"><label for="vm2" class="clickable"> Vimeo 2 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="dm" id="dm"><label for="dm" class="clickable"> Dailymotion (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="mc" id="mc"><label for="mc" class="clickable"> Metacafe (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="mg" id="mg"><label for="mg" class="clickable"> Mega (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="fe" id="fe"><label for="fe" class="clickable"> Fembed (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="movie" id="movie"><label for="movie" class="clickable"> Movie (IMDb URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="spotify" id="spotify"><label for="spotify" class="clickable"> Spotify (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="sc1" id="sc1"><label for="sc1" class="clickable"> Soundcloud 1 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="sc2" id="sc2"><label for="sc2" class="clickable"> Soundcloud 2 (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="iframe1" id="iframe1"><label for="iframe1" class="clickable"> Iframe URL (URL)</label><br>
                    <input type="radio" class="clickable" name="type" value="file" id="file"><label for="file" class="clickable"> Video URL (URL)</label>
                    </form>
                    <br>
                </div>
            </div>
            <br>
            <h4 id="VM_Emulator_Browser-in-browser">Virtual Machine, Emulator & Browser-in-browser</h4>
            <div class="selection">
                <div class="tabunrestrict">
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Browser-in-browser')">Browser-in-browser</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'VM-Emulator')">Virtual Machine / Emulator</button>
                </div>
                <div id="Browser-in-browser" class="tabcontentunrestrict">
                    <h3>Browser-in-browser</h3>
                    <a onclick="document.getElementById('urlinput').focus();" class="clickable">Iframe Browser</a><br>
                    <a href="https://iframe-browser.miniurl.repl.co/" rel="noreferrer noopener nofollow" target="_blank">Off-site Iframe Browser</a><br>
                    <a href="https://iframe-browser.miniurl.repl.co/simplified.html" rel="noreferrer noopener nofollow" target="_blank">Off-site Simplified Iframe Browser</a><br>
                    <a href="https://miniurl.id/norobots/0eRNbtlVRd4JQTdmTynI?select=iframe1" rel="noreferrer noopener nofollow" target="_blank">Secure Iframe Browser</a><br>
                    <a href="https://repl.it/@miniurl/chrome#Makefile" rel="noreferrer noopener nofollow" target="_blank">Chrome</a><br>
                    <a href="https://repl.it/@miniurl/firefox#Makefile" rel="noreferrer noopener nofollow" target="_blank">Firefox</a><br>
                    <a href="https://ieonchrome.com/" rel="noreferrer noopener nofollow" target="_blank">Cloud Internet Explorer</a><br><br>
                </div>
                <div id="VM-Emulator" class="tabcontentunrestrict">
                    <h3>Virtual Machine / Emulator</h3>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=win10_emulator" rel="noreferrer noopener nofollow" target="_blank">Windows 10</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=pearos8-64" rel="noreferrer noopener nofollow" target="_blank">Pear OS MAC</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=PearlDesktop-7.1_amd64" rel="noreferrer noopener nofollow" target="_blank">Pearl OS MAC theme</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=rhel-server-7.5-x86_64-dvd" rel="noreferrer noopener nofollow" target="_blank">RHEL Red Hat Enterprise Linux</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=linuxmint-19.1-cinnamon-32bit" rel="noreferrer noopener nofollow" target="_blank">Linux Mint</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=MX-18.2_386" rel="noreferrer noopener nofollow" target="_blank">Mx Linux</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=kali-linux-2019.1a-i386" rel="noreferrer noopener nofollow" target="_blank">Kali Linux</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=OracleLinux-R7-U6-Server-x86_64-dvd" rel="noreferrer noopener nofollow" target="_blank">Oracle Linux</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=uberstudent-4.3-xfce-i386" rel="noreferrer noopener nofollow" target="_blank">UberStudent</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=ubuntu-19.10-desktop-amd64" rel="noreferrer noopener nofollow" target="_blank">Ubuntu 19</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=ubuntu-16.04.6-desktop-i386" rel="noreferrer noopener nofollow" target="_blank">Ubuntu Gnome 16</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=debian-9.8.0-i386-DVD-1" rel="noreferrer noopener nofollow" target="_blank">Debian</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=Parrot-security-4.5.1_amd64" rel="noreferrer noopener nofollow" target="_blank">Parrot Security OS</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=elementaryos-5.0-stable" rel="noreferrer noopener nofollow" target="_blank">Elementary OS</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=zorin-os-i386" rel="noreferrer noopener nofollow" target="_blank">Zorin OS</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=chaletos-i686" rel="noreferrer noopener nofollow" target="_blank">ChaletOS</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=ReactOS-0.4.11" rel="noreferrer noopener nofollow" target="_blank">ReactOS</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=openSUSE-Edu" rel="noreferrer noopener nofollow" target="_blank">OpenSUSE Edu Li-f-e</a><br>
                    <a href="https://www.onworks.net/runos/prepare-os.html?home=init&os=Fedora-Workstation-Live-x86_64-29-1.2" rel="noreferrer noopener nofollow" target="_blank">Fedora Workstation</a><br>
                    <a href="https://www.onworks.net/os-distributions" rel="noreferrer noopener nofollow" target="_blank">More OS . . .</a><br><br>
                </div>
            </div>
            <br>
            <h4 id="alternatives">Website Alternatives</h4>
            <div class="selection">
                <div class="tabunrestrict">
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Google')">Google</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Youtube')">Youtube</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Instagram')">Instagram</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Twitter')">Twitter</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Soundcloud')">Soundcloud</button>
                </div>
                <div id="Google" class="tabcontentunrestrict">
                    <h3>Google Alternatives</h3>
                    <a href="https://duckduckgo.com" rel="noreferrer noopener nofollow" target="_blank">https://duckduckgo.com</a><br>
                    <a href="https://startpage.com" rel="noreferrer noopener nofollow" target="_blank">https://startpage.com</a><br>
                    <a href="https://ecosia.com" rel="noreferrer noopener nofollow" target="_blank">https://cliqz.com</a><br>
                    <a href="https://cliqz.com" rel="noreferrer noopener nofollow" target="_blank">https://cliqz.com</a><br>
                    <a href="https://searchincognito.com" rel="noreferrer noopener nofollow" target="_blank">https://searchincognito.com</a><br>
                    <a href="https://searchencrypt.com" rel="noreferrer noopener nofollow" target="_blank">https://searchencrypt.com</a><br>
                    <a href="https://thedisagreeinginternet.com" rel="noreferrer noopener nofollow" target="_blank">hhttps://thedisagreeinginternet.com</a><br>
                    <a href="https://search.privacytools.io/searx/" rel="noreferrer noopener nofollow" target="_blank">https://search.privacytools.io/searx/</a><br>
                    <a href="https://search.snopyta.org/" rel="noreferrer noopener nofollow" target="_blank">https://search.snopyta.org/</a><br>
                    <a href="https://search.disroot.org/" rel="noreferrer noopener nofollow" target="_blank">https://search.disroot.org/</a><br><br>
                </div>
                <div id="Youtube" class="tabcontentunrestrict">
                    <h3>Youtube Alternatives</h3>
                    <a href="https://invidio.us/" rel="noreferrer noopener nofollow" target="_blank">https://invidio.us/</a><br>
                    <a href="https://invidious.snopyta.org/" rel="noreferrer noopener nofollow" target="_blank">https://invidious.snopyta.org/</a><br>
                    <a href="https://invidious.kavin.rocks/" rel="noreferrer noopener nofollow" target="_blank">https://invidious.kavin.rocks/</a><br>
                    <a href="https://yewtu.be/" rel="noreferrer noopener nofollow" target="_blank">https://yewtu.be/</a><br>
                    <a href="https://invidious.ggc-project.de/" rel="noreferrer noopener nofollow" target="_blank">https://invidious.ggc-project.de/</a><br>
                    <a href="https://invidiou.site/" rel="noreferrer noopener nofollow" target="_blank">https://invidiou.site/</a><br>
                    <a href="https://invidious.fdn.fr/" rel="noreferrer noopener nofollow" target="_blank">https://invidious.fdn.fr/</a><br>
                    <a href="https://invidious.tube/" rel="noreferrer noopener nofollow" target="_blank">https://invidious.tube/</a><br>
                    <a href="https://invidious.xyz/" rel="noreferrer noopener nofollow" target="_blank">https://invidious.xyz/</a><br>
                    <a href="https://invidious.site/" rel="noreferrer noopener nofollow" target="_blank">https://invidious.site/</a><br>
                    <a href="https://invidious.glie.town/" rel="noreferrer noopener nofollow" target="_blank">https://invidious.glie.town/</a><br>
                    <a href="https://yt.iswleuven.be/" rel="noreferrer noopener nofollow" target="_blank">https://yt.iswleuven.be/</a><br>
                    <a href="https://vid.mint.lgbt/" rel="noreferrer noopener nofollow" target="_blank">https://vid.mint.lgbt/</a><br>
                    <a href="https://tube.cadence.moe/" rel="noreferrer noopener nofollow" target="_blank">https://tube.cadence.moe/</a><br>
                    <a href="https://cadence.moe/cloudtube/subscriptions" rel="noreferrer noopener nofollow" target="_blank">https://cadence.moe/cloudtube/subscriptions</a><br>
                    <a href="https://tr-cam.com" rel="noreferrer noopener nofollow" target="_blank">https://tr-cam.com</a><br>
                    <a href="https://tutvobed.ru" rel="noreferrer noopener nofollow" target="_blank">https://tutvobed.ru</a><br>
                    <a href="https://grfilms.net" rel="noreferrer noopener nofollow" target="_blank">https://grfilms.net</a><br>
                    <a href="https://us.vlip.lv" rel="noreferrer noopener nofollow" target="_blank">https://us.vlip.lv</a><br><br>
                </div>
                <div id="Instagram" class="tabcontentunrestrict">
                    <h3>Instagram Alternatives</h3>
                    <a href="https://imginn.com" rel="noreferrer noopener nofollow" target="_blank">https://imginn.com</a><br>
                    <a href="https://bibliogram.art/" rel="noreferrer noopener nofollow" target="_blank">https://bibliogram.art/</a><br>
                    <a href="https://bibliogram.snopyta.org" rel="noreferrer noopener nofollow" target="_blank">https://bibliogram.snopyta.org</a><br>
                    <a href="https://imgund.com/" rel="noreferrer noopener nofollow" target="_blank">https://imgund.com/</a><br>
                    <a href="https://imgolo.com/" rel="noreferrer noopener nofollow" target="_blank">https://imgolo.com/</a><br>
                    <a href="https://picboon.com/" rel="noreferrer noopener nofollow" target="_blank">https://picboon.com/</a><br>
                    <a href="https://wopita.com/" rel="noreferrer noopener nofollow" target="_blank">https://wopita.com/</a><br>
                    <a href="https://instaxyz.com/" rel="noreferrer noopener nofollow" target="_blank">https://instaxyz.com/</a><br>
                    <a href="https://www.desksta.com/" rel="noreferrer noopener nofollow" target="_blank">https://www.desksta.com/</a><br>
                    <a href="https://instamview.com/" rel="noreferrer noopener nofollow" target="_blank">https://instamview.com/</a><br>
                    <a href="https://gramhum.com/" rel="noreferrer noopener nofollow" target="_blank">https://gramhum.com/</a><br>
                    <a href="https://igwebview.com/" rel="noreferrer noopener nofollow" target="_blank">https://igwebview.com/</a><br>
                    <a href="https://instaviewer.ga/" rel="noreferrer noopener nofollow" target="_blank">https://instaviewer.ga/</a><br>
                    <a href="https://www.instaonline.org/" rel="noreferrer noopener nofollow" target="_blank">https://www.instaonline.org/</a><br>
                    <a href="https://ingram.life/" rel="noreferrer noopener nofollow" target="_blank">https://ingram.life/</a><br>
                    <a href="https://pikdo.info/" rel="noreferrer noopener nofollow" target="_blank">https://pikdo.info/</a><br>
                    <a href="https://www.mestalking.com/" rel="noreferrer noopener nofollow" target="_blank">https://www.mestalking.com/</a><br><br>
                </div>
                <div id="Twitter" class="tabcontentunrestrict">
                    <h3>Twitter Alternatives</h3>
                    <a href="https://nitter.net/" rel="noreferrer noopener nofollow" target="_blank">https://nitter.net/</a><br>
                    <a href="https://nitter.snopyta.org/" rel="noreferrer noopener nofollow" target="_blank">https://nitter.snopyta.org/</a><br>
                    <a href="https://nitter.nixnet.services/" rel="noreferrer noopener nofollow" target="_blank">https://nitter.nixnet.services/</a><br>
                    <a href="https://nitter.fdn.fr/" rel="noreferrer noopener nofollow" target="_blank">https://nitter.fdn.fr/</a><br>
                    <a href="https://www.socialdown.com/tw/twitter-video-downloader/" rel="noreferrer noopener nofollow" target="_blank">https://www.socialdown.com/tw/twitter-video-downloader/</a><br><br>
                </div>
                <div id="Soundcloud" class="tabcontentunrestrict">
                    <h3>Soundcloud Alternatives</h3>
                    <a href="https://www.socialdown.com/sc/soundcloud-downloader/" rel="noreferrer noopener nofollow" target="_blank">https://www.socialdown.com/sc/soundcloud-downloader/</a><br>
                    <a href="http://keepsaveit.com/audio-songs/" rel="noreferrer noopener nofollow" target="_blank">http://keepsaveit.com/audio-songs/</a><br><br>
                </div>
            </div>
            <br>
            <h4 id="games">Games</h4>
            <div class="selection">
                <iframe id="gameframe" name="game_frame" style="display:none" src="https://iframe-browser.miniurl.repl.co/notice.html" frameborder="0" width="750" height="421.875" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true" mozallowfullscreen="true" msallowfullscreen="true" oallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                <button style="display:none" id="buttongameframe1" onclick="fullScreenRequest('gameframe')" class="barbutton" title="Fullscreen"><i class="material-icons" style="font-size: 10px">fullscreen</i></button>
                <button style="display:none" id="buttongameframe2" onclick="clearIframe2()" class="barbutton" title="Clear Iframe"><i class="material-icons" style="font-size: 10px">clear</i></button>
                <button id="buttonopenframe" onclick="openFrame()" class="barbutton" title="Open Iframe">Open Game Frame</button>
                <br>
                <h5>HTML5 Games</h5>
                <div class="tabunrestrict">
                    <button class="tablinksunrestrict" onclick="openMethod(event, '2048')">2048</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Astray')">Astray</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Breaklock')">Breaklock</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Breakout')">Breakout</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'CookieClicker')">Cookie Clicker</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'FlappyBird')">Flappy Bird</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Hextris')">Hextris</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'OnslaughtArena')">Onslaught Arena</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Pac-Man')">Pac-Man</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'RadiusRaid')">Radius Raid</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'SpaceInvaders')">Space Invaders</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Towermaster')">Towermaster</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Tetris')">Tetris</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Defly')">Defly.io</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Fivemintokill')">5mintokill.io</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Slither')">Slither.io</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Dino')">Dinosaur</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Minecraft')">Minecraft</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Littlebigsnake')">Little Big Snake</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Surviv')">Surviv.io</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Flappy2048')">Flappy 2048</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Shellshock')">Shellshock</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Doodlejump')">Doodle jump</button>
                </div>
                <div id="2048" class="tabcontentunrestrict">
                    <h3>2048</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/2048/index.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/2048/index.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/2048/index.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/2048/index.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.miniurl.repl.co/games/2048.html" target="game_frame">Server 5</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/2048/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://papercompany.ga/assets/g/html/2048/index.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/2048/index.html" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/2048/index.html" target="game_frame">Server 9</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/2048/index.html" target="game_frame">Server 10</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/2048/index.html" target="game_frame">Server 11</a><br>
                    <a href="https://y-net--miniurl.repl.co/games/2048.html" target="game_frame">Server 12</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/2048/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/2048/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/2048/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/2048/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/2048/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/2048/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="Astray" class="tabcontentunrestrict">
                    <h3>Astray</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/astray/index.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/astray/index.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/astray/index.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/astray/index.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/astray/index.html" target="game_frame">Server 5</a><br>
                    <a href="https://papercompany.ga/assets/g/html/astray/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/astray/index.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/astray/index.html" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/astray/index.html" target="game_frame">Server 9</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/astray/index.html" target="game_frame">Server 10</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/astray/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/astray/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/astray/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/astray/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/astray/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/astray/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="Breaklock" class="tabcontentunrestrict">
                    <h3>Breaklock</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/breaklock/index.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/breaklock/index.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/breaklock/index.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/breaklock/index.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/breaklock/index.html" target="game_frame">Server 5</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/breaklock/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/breaklock/index.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/breaklock/index.html" target="game_frame">Server 8</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/breaklock/index.html" target="game_frame">Server 9</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/breaklock/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/breaklock/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/breaklock/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/breaklock/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/breaklock/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/breaklock/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="Breakout" class="tabcontentunrestrict">
                    <h3>Breakout</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/nerd.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/nerd.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/nerd.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/nerd.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.miniurl.repl.co/games/nerd.html" target="game_frame">Server 5</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/nerd.html" target="game_frame">Server 6</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/nerd.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/nerd.html" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/nerd.html" target="game_frame">Server 9</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/nerd.html" target="game_frame">Server 10</a><br>
                    <a href="https://y-net--miniurl.repl.co/games/nerd.html" target="game_frame">Server 11</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/nerd.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/nerd.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/nerd.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/nerd.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/nerd.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/nerd.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="CookieClicker" class="tabcontentunrestrict">
                    <h3>Cookie Clicker</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/cookies/index.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/cookies/index.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/cookies/index.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/cookies/index.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.miniurl.repl.co/games/cookie.html" target="game_frame">Server 5</a><br>
                    <a href="https://y-net.ga/gfiles/cookies/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://papercompany.ga/assets/g/html/cookie/index.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/cookies/index.html" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/cookies/index.html" target="game_frame">Server 9</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/cookies/index.html" target="game_frame">Server 10</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/cookies/index.html" target="game_frame">Server 11</a><br>
                    <a href="https://y-net--miniurl.repl.co/games/cookie.html" target="game_frame">Server 12</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://orteil.dashnet.org/cookieclicker/" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/cookies/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://printers.ga/gfiles/html5games/cookies/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/cookies/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/cookies/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/cookies/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/cookies/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 7</a><br><br>
                </div>
                <div id="FlappyBird" class="tabcontentunrestrict">
                    <h3>Flappy Bird</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/flappybird/index.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/flappybird/index.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/flappybird/index.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/flappybird/index.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/flappybird/index.html" target="game_frame">Server 5</a><br>
                    <a href="https://papercompany.ga/assets/g/html/flappybird/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/flappybird/index.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/flappybird/index.html" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/flappybird/index.html" target="game_frame">Server 9</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/flappybird/index.html" target="game_frame">Server 10</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/flappybird/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/flappybird/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/flappybird/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/flappybird/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/flappybird/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/flappybird/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="Hextris" class="tabcontentunrestrict">
                    <h3>Hextris</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/hextris/index.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/hextris/index.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/hextris/index.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/hextris/index.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/hextris/index.html" target="game_frame">Server 5</a><br>
                    <a href="https://papercompany.ga/assets/g/html/hextris/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/hextris/index.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/hextris/index.html" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/hextris/index.html" target="game_frame">Server 9</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/hextris/index.html" target="game_frame">Server 10</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/hextris/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/hextris/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/hextris/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/hextris/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/hextris/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/hextris/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="OnslaughtArena" class="tabcontentunrestrict">
                    <h3>Onslaught Arena</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/onslaughtarena.html" target="game_frame">Server 1</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/onslaughtarena.html" target="game_frame">Server 2</a><br>
                    <a href="https://y-net.ga/gfiles/onslaughtarena.html" target="game_frame">Server 3</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/onslaughtarena.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/onslaughtarena.html" target="game_frame">Server 5</a><br><br>
                </div>
                <div id="Pac-Man" class="tabcontentunrestrict">
                    <h3>Pac-Man</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/pacman/index.htm" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/pacman/index.htm" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/pacman/index.htm" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/pacman/index.htm" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.miniurl.repl.co/games/pacman.html" target="game_frame">Server 5</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/pacman/index.htm" target="game_frame">Server 6</a><br>
                    <a href="https://papercompany.ga/assets/g/html/pacman/index.htm" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/pacman/index.htm" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/pacman/index.htm" target="game_frame">Server 9</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/pacman/index.htm" target="game_frame">Server 10</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/pacman/index.htm" target="game_frame">Server 11</a><br>
                    <a href="https://y-net--miniurl.repl.co/games/pacman.html" target="game_frame">Server 12</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/pacman/index.htm" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/pacman/index.htm" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/pacman/index.htm" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/pacman/index.htm" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/pacman/index.htm" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/pacman/index.htm" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="RadiusRaid" class="tabcontentunrestrict">
                    <h3>Radius Raid</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/radius-raid/min.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/radius-raid/min.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/radius-raid/min.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/radius-raid/min.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/radius-raid/min.html" target="game_frame">Server 5</a><br>
                    <a href="https://papercompany.ga/assets/g/html/radius-raid/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/radius-raid/min.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/radius-raid/min.html" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/radius-raid/min.html" target="game_frame">Server 9</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/radius-raid/min.html" target="game_frame">Server 10</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/radius-raid/min.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/radius-raid/min.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/radius-raid/min.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/radius-raid/min.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/radius-raid/min.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/radius-raid/min.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="SpaceInvaders" class="tabcontentunrestrict">
                    <h3>Space Invaders</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/spaceinvaders/index.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/spaceinvaders/index.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/spaceinvaders/index.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/spaceinvaders/index.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/spaceinvaders/index.html" target="game_frame">Server 5</a><br>
                    <a href="https://papercompany.ga/assets/g/html/spaceinvaders/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/spaceinvaders/index.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/spaceinvaders/index.html" target="game_frame">Server 8</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/spaceinvaders/index.html" target="game_frame">Server 9</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/spaceinvaders/index.html" target="game_frame">Server 10</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/spaceinvaders/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/spaceinvaders/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/spaceinvaders/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/spaceinvaders/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/spaceinvaders/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/spaceinvaders/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="Towermaster" class="tabcontentunrestrict">
                    <h3>Towermaster</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://titaniumnetwork.miniurl.repl.co/gfiles/html5games/towermaster/index.html" target="game_frame">Server 1</a><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/gfiles/html5games/towermaster/index.html" target="game_frame">Server 2</a><br>
                    <a href="https://titaniumlite.miniurl.repl.co/gfiles/towermaster/index.html" target="game_frame">Server 3</a><br>
                    <a href="https://y-net-tn.miniurl.repl.co/gfiles/html5games/towermaster/index.html" target="game_frame">Server 4</a><br>
                    <a href="https://y-net.ga/gfiles/html5games/towermaster/index.html" target="game_frame">Server 5</a><br>
                    <a href="https://titaniumnetwork--miniurl.repl.co/gfiles/html5games/towermaster/index.html" target="game_frame">Server 6</a><br>
                    <a href="https://titaniumphoenix--miniurl.repl.co/gfiles/html5games/towermaster/index.html" target="game_frame">Server 7</a><br>
                    <a href="https://titaniumlite--miniurl.repl.co/gfiles/towermaster/index.html" target="game_frame">Server 8</a><br>
                    <a href="https://y-net-tn--miniurl.repl.co/gfiles/html5games/towermaster/index.html" target="game_frame">Server 9</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumnetwork.org/gfiles/html5games/towermaster/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://printers.ga/gfiles/html5games/towermaster/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://mlml.gq/gfiles/html5games/towermaster/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br>
                    <a href="https://vroomvroom.cf/gfiles/html5games/towermaster/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 4</a><br>
                    <a href="https://subwoofersounds.ga/gfiles/html5games/towermaster/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 5</a><br>
                    <a href="https://www.phoenix-le.cf/gfiles/html5games/towermaster/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 6</a><br><br>
                </div>
                <div id="Tetris" class="tabcontentunrestrict">
                    <h3>Tetris</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://y-net.miniurl.repl.co/games/tetris.html" target="game_frame">Server 1</a><br>
                    <a href="https://f3.silvergames.com/m/tetris/" target="game_frame">Server 2</a><br>
                    <a href="https://y-net--miniurl.repl.co/games/tetris.html" target="game_frame">Server 3</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://f3.silvergames.com/m/tetris/" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://y-net.miniurl.repl.co/games/tetris.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br><br>
                </div>
                <div id="Defly" class="tabcontentunrestrict">
                    <h3>Defly.io</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://defly.io" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://defly.io" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fdefly.io" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3Dv8njmscckc4obqbkx1t1w4p6zct9xyq9" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Fivemintokill" class="tabcontentunrestrict">
                    <h3>5mintokill.io</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://5mintokill.io" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://5mintokill.io" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2F5mintokill.io" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3Dzuej7kkrae90u9675roqf2tvkw8fznwi" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Slither" class="tabcontentunrestrict">
                    <h3>Slither.io</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="http://slither.io" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="http://slither.io" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="http://miniurlid.000webhostapp.com/app/iframe?url=http%3A%2F%2Fslither.io" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="http://miniurlid.000webhostapp.com/app/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3Do2xzxr68mo5is4mo2x7pz0ufeyjss3x9" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Dino" class="tabcontentunrestrict">
                    <h3>Chrome Dinosaur</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://dino.miniurl.repl.co/" target="game_frame">Server 1</a><br>
                    <a href="https://dino.njilc.org/" target="game_frame">Server 2</a><br>
                    <a href="https://papercompany.ga/assets/g/html/dinosour/index.html" target="game_frame">Server 3</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://dino.miniurl.repl.co/" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://dino.njilc.org/" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://papercompany.ga/assets/g/html/dinosour/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Minecraft" class="tabcontentunrestrict">
                    <h3>Minecraft</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://papercompany.ga/assets/g/html/mc/index.html" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://papercompany.ga/assets/g/html/mc/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fpapercompany.ga%2Fassets%2Fg%2Fhtml%2Fmc%2Findex.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3D0zejb1w2tksqbr3vbs0niwi79fhfar2l" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Littlebigsnake" class="tabcontentunrestrict">
                    <h3>Little Big Snake</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://littlebigsnake.com/" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://littlebigsnake.com/" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Flittlebigsnake.com%2F" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3Dqy3qrcuj6q1pbazklrjc87zqf34v4rty" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Surviv" class="tabcontentunrestrict">
                    <h3>Surviv.io</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://surviv.io" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://surviv.io" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fsurviv.io" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3D3v6tf4r4r2604uag5ob05ba1aqg2szcv" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Flappy2048" class="tabcontentunrestrict">
                    <h3>Flappy 2048</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://papercompany.ga/assets/g/html/flappy-2048/index.html" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://papercompany.ga/assets/g/html/flappy-2048/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fpapercompany.ga%2Fassets%2Fg%2Fhtml%2Fflappy-2048%2Findex.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3D0mcualjcffx7wzu07ptkk0xbr0tl0glx" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Shellshock" class="tabcontentunrestrict">
                    <h3>Shellshock</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://shellshock.io/" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://shellshock.io/" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fshellshock.io%2F" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3Dqmjrav2y7tieyc1mtbd7qn2aewww1y1p" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="Doodlejump" class="tabcontentunrestrict">
                    <h3>Doodle Jump</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://papercompany.ga/assets/g/html/doodle-jump/index.html" target="game_frame">Server 1</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://papercompany.ga/assets/g/html/doodle-jump/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fpapercompany.ga%2Fassets%2Fg%2Fhtml%2Fdoodle-jump%2Findex.html" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://miniurl.id/norobots/iframe?url=https%3A%2F%2Fminiurl.id%2Ftools%2Fredirector%3Ftoken%3Dfsmh8bnw50bv7hly05he91xm0bzq9ole" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>

                <h5>Other Games</h5>
                <div class="tabunrestrict">
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Scratch')">Scratch Games</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Powerpoint')">PowerPoint Games</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'Flash')">Flash Games</button>
                </div>
                <div id="Scratch" class="tabcontentunrestrict">
                    <h3>ωαтεяғαℓℓ | ᴀ ᴘʟᴀᴛғᴏʀᴍᴇʀ</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://scratch.mit.edu/projects/339928531/embed" target="game_frame">Server 1</a><br>
                    <label>Open in new tab</label><br>
                    <a href="https://scratch.mit.edu/projects/339928531/embed" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br><br>
                    <h3>Space Online</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://scratch.mit.edu/projects/435935069/embed" target="game_frame">Server 1</a><br>
                    <label>Open in new tab</label><br>
                    <a href="https://scratch.mit.edu/projects/435935069/embed" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br><br>
                    <h3>Among Us</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://scratch.mit.edu/projects/435416012/embed" target="game_frame">Server 1</a><br>
                    <label>Open in new tab</label><br>
                    <a href="https://scratch.mit.edu/projects/435416012/embed" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br><br>
                </div>
                <div id="Powerpoint" class="tabcontentunrestrict">
                    <h3>Five Nights at Pipu's Demo</h3>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://onedrive.live.com/embed?cid=9304E8B3EB5CAB01&resid=9304E8B3EB5CAB01%21108&authkey=ABG52EUYRgaAXoM&em=2" target="game_frame">Server 1</a><br>
                    <label>Open in new tab</label><br>
                    <a href="https://1drv.ms/p/s!AgGrXOuz6ASTbGpEE1p8RIY18T0?e=yamAZO" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br><br>
                </div>
                <div id="Flash" class="tabcontentunrestrict">
                    <h3>Flash Games Collection</h3>
                    <label>Open in new tab</label><br>
                    <a href="https://titaniumphoenix.miniurl.repl.co/selection3.html?section=flash" rel="noreferrer noopener nofollow" target="_blank">Collection 1</a><br>
                    <a href="http://www.funhost.net/home/" rel="noreferrer noopener nofollow" target="_blank">Collection 2</a><br>
                    <a href="https://sites.google.com/site/subgfyfs/system/app/pages/sitemap/list" rel="noreferrer noopener nofollow" target="_blank">Collection 3</a><br>
                    <a href="https://sites.google.com/site/subgfyfs/system/app/pages/sitemap/list" rel="noreferrer noopener nofollow" target="_blank">Collection 4</a><br>
                    <a href="https://titaniumnetwork.org/s2c.html" rel="noreferrer noopener nofollow" target="_blank">Collection 5</a><br><br>
                </div>
            </div>
            <br>
            <a title="Click to copy" onclick="copyText('<?php echo $protocol; ?>://<?php echo $host; ?>/#chromebook'); return false" href="/#chromebook" id="chromebook"><h2>Chromebook Restrictions Unblocker</h2></a>
            <h4 id="chrome_policy">chrome://policy</h4>
            <div class="selection">
                <div class="tabunrestrict">
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'AllowDeletingBrowserHistory')">AllowDeletingBrowserHistory</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'AllowDinosaurEasterEgg')">AllowDinosaurEasterEgg</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'DeveloperToolsAvailability')">DeveloperToolsAvailability (deprecated)</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'DeveloperToolsDisabled')">DeveloperToolsDisabled (deprecated)</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'DeviceBlockDevmode')">DeviceBlockDevmode (unverified)</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'ExtensionInstallForcelist')">ExtensionInstallForcelist (unverified)</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'ExtensionSettings')">ExtensionSettings</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'ForceYouTubeRestrict')">ForceYouTubeRestrict</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'IncognitoModeAvailability')">IncognitoModeAvailability</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'URLBlacklist')">URLBlacklist</button>
                </div>
                <div id="AllowDeletingBrowserHistory" class="tabcontentunrestrict">
                    <h3>AllowDeletingBrowserHistory</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=AllowDeletingBrowserHistory" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=AllowDeletingBrowserHistory</a><br>
                    <label>There is no way to delete Browser History if 'AllowDeletingBrowserHistory' is set to false in chrome policy</label><br>
                    <label>But there are ways to use internet without leaving browser history</label><br>
                    <a class="barbutton" href="#iframe-browser">Iframe</a>
                    <a class="barbutton" href="#Browser-in-browser" onclick="openMethod(event, 'Browser-in-browser')">Browser-in-browser</a>
                    <a class="barbutton" href="#VM-Emulator" onclick="openMethod(event, 'VM-Emulator')">Virtual Machine / Emulator</a><br><br>
                    <label>ChromeApp-Based Browser</label><br>
                    <a href="https://chrome.google.com/webstore/detail/bit-browser/igidaonkecelbangcglegdalgmbjgiio?hl=en" rel="noreferrer noopener nofollow" target="_blank">Bit Browser</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser-alpha/nefehiekhccmedmdoilmhikhdiiijkbe?hl=en" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Alpha</a><br>
                    <a href="https://chrome.google.com/webstore/detail/gb-browser/jnmipkhdnlcnfllifhlohfigomcpcmhc?hl=en" rel="noreferrer noopener nofollow" target="_blank">GB Browser</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser/jgofbeaahhiapondaabffdhppadnimcm?hl=en" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser (mirror)</a><br>
                    <a href="https://chrome.google.com/webstore/detail/byte-browser-20/lfgcgehnjbgjeigjldphnaaddjjmfali?hl=en" rel="noreferrer noopener nofollow" target="_blank">Byte Browser 2.0</a><br>
                    <a href="https://chrome.google.com/webstore/detail/alpha-browser-20/bfbobdlagdgbknpjoeidaefbhjcengjg?hl=en" rel="noreferrer noopener nofollow" target="_blank">Alpha Browser 2.0</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser-alpha/dckeopcgdjpomnfiilhlladijgfjafed" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Alpha (mirror)</a><br>
                    <a href="https://github.com/s0/leaf-browser" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Source Code</a><br><br>
                </div>
                <div id="AllowDinosaurEasterEgg" class="tabcontentunrestrict">
                    <h3>AllowDinosaurEasterEgg</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=AllowDinosaurEasterEgg" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=AllowDinosaurEasterEgg</a><br>
                    <label>There is no way to play browser-based dino if 'AllowDinosaurEasterEgg' is set to false in chrome policy</label><br>
                    <label>Play dino from web</label><br>
                    <a style="color:#ffffff;" href="#games">Make sure to click 'Open Game Frame' first before play the game</a><br>
                    <a style="color:#ffffff;" href="#games">Open in iframe</a><br>
                    <a href="https://dino.miniurl.repl.co/" target="game_frame">Server 1</a><br>
                    <a href="https://dino.njilc.org/" target="game_frame">Server 2</a><br>
                    <a href="https://papercompany.ga/assets/g/html/dinosour/index.html" target="game_frame">Server 3</a><br><br>
                    <label>Open in new tab</label><br>
                    <a href="https://dino.miniurl.repl.co/" rel="noreferrer noopener nofollow" target="_blank">Server 1</a><br>
                    <a href="https://dino.njilc.org/" rel="noreferrer noopener nofollow" target="_blank">Server 2</a><br>
                    <a href="https://papercompany.ga/assets/g/html/dinosour/index.html" rel="noreferrer noopener nofollow" target="_blank">Server 3</a><br><br>
                </div>
                <div id="DeveloperToolsAvailability" class="tabcontentunrestrict">
                    <h3>DeveloperToolsAvailability (deprecated)</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=DeveloperToolsAvailability" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=DeveloperToolsAvailability</a><br>
                    <label>Enable developer tools (inspect)</label><br>
                    <label>Using Chrome Extension</label><br>
                    <label>Web Inspector</label><br>
                    <a href="https://chrome.google.com/webstore/detail/web-inspector/enibedkmbpadhfofcgjcphipflcbpelf?hl=en" rel="noreferrer noopener nofollow" target="_blank">https://chrome.google.com/webstore/detail/web-inspector/enibedkmbpadhfofcgjcphipflcbpelf?hl=en</a><br><br>
                    <label>Using javascript bookmarklet (deprecated)<label><br>
                    <label>Click, drag, and drop the following link to your links toolbar or bookmarks bar</label><br>
                    <a href="javascript:(function() {var script=document.createElement('script');script.src='https://goggles.mozilla.org'+'/webxray.js';script.className='webxray';script.setAttribute('data-lang','en-US');script.setAttribute('data-baseuri','https://goggles.mozilla.org');document.body.appendChild(script);}())" onmouseover="window.status='';return true" onclick="return false">Inspect</a><br>
                    <textarea style="width: 650px; height: 75px; resize: none;" title="Select to copy" onfocus="copyText(this.innerHTML);this.select();document.getElementById('copiedstatement').style = 'display: block;'">javascript:(function() {var script=document.createElement('script');script.src='https://goggles.mozilla.org'+'/webxray.js';script.className='webxray';script.setAttribute('data-lang','en-US');script.setAttribute('data-baseuri','https://goggles.mozilla.org');document.body.appendChild(script);}())</textarea><br>
                    <label id="copiedstatement" style="display: none;">Copied !<label>
                </div>
                <div id="DeveloperToolsDisabled" class="tabcontentunrestrict">
                    <h3>DeveloperToolsDisabled (deprecated)</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=DeveloperToolsDisabled" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=DeveloperToolsDisabled</a><br>
                    <label>Enable developer tools (inspect)</label><br>
                    <label>Using Chrome Extension</label><br>
                    <label>Web Inspector</label><br>
                    <a href="https://chrome.google.com/webstore/detail/web-inspector/enibedkmbpadhfofcgjcphipflcbpelf?hl=en" rel="noreferrer noopener nofollow" target="_blank">https://chrome.google.com/webstore/detail/web-inspector/enibedkmbpadhfofcgjcphipflcbpelf?hl=en</a><br><br>
                    <label>Using javascript bookmarklet (deprecated)<label><br>
                    <label>Click, drag, and drop the following link to your links toolbar or bookmarks bar</label><br>
                    <a href="javascript:(function() {var script=document.createElement('script');script.src='https://goggles.mozilla.org'+'/webxray.js';script.className='webxray';script.setAttribute('data-lang','en-US');script.setAttribute('data-baseuri','https://goggles.mozilla.org');document.body.appendChild(script);}())" onmouseover="window.status='';return true" onclick="return false">Inspect</a><br>
                    <textarea style="width: 650px; height: 75px; resize: none;" title="Select to copy" onfocus="copyText(this.innerHTML);this.select();document.getElementById('copiedstatement2').style = 'display: block;'">javascript:(function() {var script=document.createElement('script');script.src='https://goggles.mozilla.org'+'/webxray.js';script.className='webxray';script.setAttribute('data-lang','en-US');script.setAttribute('data-baseuri','https://goggles.mozilla.org');document.body.appendChild(script);}())</textarea><br>
                    <label id="copiedstatement2" style="display: none;">Copied !<label>
                </div>
                <div id="DeviceBlockDevmode" class="tabcontentunrestrict">
                    <h3>DeviceBlockDevmode (unverified)</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=DeviceBlockDevmode" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=DeviceBlockDevmode</a><br>
                    <label>Enable Developer Mode</label><br>
                    <label>Available if 'DeveloperToolsAvailability' is set to '0' or '1'. Instructions from top-left</label>
                    <div class="rowforimg">
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_1.png" alt="Open 'chrome://os-settings' and click 'About Chrome OS'" style="width:100%" onclick="enlarge(this);">
                    </div>
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_2.png" alt="Click 'Additional details'" style="width:100%" onclick="enlarge(this);">
                    </div>
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_3.png" alt="Open Inspect (Ctrl+Shift+I)" style="width:100%" onclick="enlarge(this);">
                    </div>
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_4.png" alt="Select the 'Change channel' button" style="width:100%" onclick="enlarge(this);">
                    </div>
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_5.png" alt="Change the button state from 'disabled'" style="width:100%" onclick="enlarge(this);">
                    </div>
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_6.png" alt=". . to 'enabled'" style="width:100%" onclick="enlarge(this);">
                    </div>
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_7.png" alt="Click 'Change channel'" style="width:100%" onclick="enlarge(this);">
                    </div>
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_8.png" alt="Change 'channel' from 'Stable'" style="width:100%" onclick="enlarge(this);">
                    </div>
                    <div class="columnforimg">
                        <img src="https://miniurl.id/assets/unrestrict/DeviceBlockDevmode_9.png" alt=". . to 'Developer - unstable' and click 'Change channel'" style="width:100%" onclick="enlarge(this);">
                    </div>
                    </div>

                    <div class="containerforexpandedImg clickable" onclick="imgzoomin();" id="containerforexpandedImg">
                    <!--
                    <span onclick="hidelargeimg();" class="closebtn clickable" style="z-index:9999999;">&times;</span>
                    -->
                    <img id="expandedImg">
                    <div id="imgtext"></div>
                    </div>
                </div>
                <div id="ExtensionInstallForcelist" class="tabcontentunrestrict">
                    <h3>ExtensionInstallForcelist (unverified)</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=ExtensionInstallForcelist" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=ExtensionInstallForcelist</a><br>
                    <label>With this policy, administrator will set values of extension to force install.</label><br>
                    <label>But there are ways to remove extensions that are installed forcely. For example, GoGuardian:</label><br>
                    <a class="barbutton" href="#removeGoguardian" onclick="openMethod(event, 'removeGoguardian')">Remove GoGuardian</a>
                </div>
                <div id="ExtensionSettings" class="tabcontentunrestrict">
                    <h3>ExtensionSettings</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=ExtensionSettings" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=ExtensionSettings</a><br>
                    <label>With this policy, administrator will set values of blocked permissions for browser extension.</label><br>
                    <label>But there are ways to use a tool that has a same functions with the blocked permissions.</label><br>
                    <label>For example, proxy & vpnProvider:</label><br>
                    <label>To unblock websites, use:</label><br>
                    <a class="barbutton" href="#Off-site-Proxy">Off-site Proxy</a>
                    <a class="barbutton" href="#VM_Emulator_Browser-in-browser">Virtual Machine, Emulator & Browser-in-browser</a>
                </div>
                <div id="ForceYouTubeRestrict" class="tabcontentunrestrict">
                    <h3>ForceYouTubeRestrict</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=ForceYouTubeRestrict" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=ForceYouTubeRestrict</a><br>
                    <label>If 'ForceYouTubeRestrict' is set to '1' or '2', restricted videos are inaccessible on 'youtube.com'</label><br>
                    <label>To watch restricted youtube videos, avoid 'youtube.com' domain. Ways to watch restricted youtube videos:</label><br>
                    <label>Turn 'https://www.youtube.com/watch?v=9FXSN6Y2pgY'<br>to <a href="https://www.youtube-nocookie.com/embed/9FXSN6Y2pgY?autoplay=1&start=43" rel="noreferrer noopener nofollow" target="_blank">https://www.youtube-nocookie.com/embed/9FXSN6Y2pgY</a><span style="color:#222222;">, Caution: GoGuardian can track your watch history!</span></label><br>
                    <label>Access youtube from youtube alternatives</label><br>
                    <a class="barbutton" href="#Youtube" onclick="openMethod(event, 'Youtube')">Youtube alternatives</a><br>
                    <label>Access video from youtube CDN. Use our Youtube video proxy or watch proxy</label><br>
                    <a class="barbutton" href="#Videoproxy" onclick="openMethod(event, 'Videoproxy')">Youtube video proxy</a>
                    <button class="barbutton" onclick="document.getElementById('watchproxy').submit()">Watch proxy</button><br>
                    <label>Access youtube from Off-site proxy or Virtual Machine, Emulator & Browser-in-browser</label><br>
                    <a class="barbutton" href="#Off-site-Proxy">Off-site Proxy</a>
                    <a class="barbutton" href="#VM_Emulator_Browser-in-browser">Virtual Machine, Emulator & Browser-in-browser</a>
                </div>
                <div id="IncognitoModeAvailability" class="tabcontentunrestrict">
                    <h3>IncognitoModeAvailability</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=IncognitoModeAvailability" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=IncognitoModeAvailability</a><br>
                    <label>There is no way to us incognito mode if 'AllowDeletingBrowserHistory' is set to '1' in chrome policy</label><br>
                    <label>But there are ways to use internet without leaving browser history</label><br>
                    <a class="barbutton" href="#iframe-browser">Iframe</a>
                    <a class="barbutton" href="#Browser-in-browser" onclick="openMethod(event, 'Browser-in-browser')">Browser-in-browser</a>
                    <a class="barbutton" href="#VM-Emulator" onclick="openMethod(event, 'VM-Emulator')">Virtual Machine / Emulator</a><br><br>
                    <label>ChromeApp-Based Browser</label><br>
                    <a href="https://chrome.google.com/webstore/detail/bit-browser/igidaonkecelbangcglegdalgmbjgiio?hl=en" rel="noreferrer noopener nofollow" target="_blank">Bit Browser</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser-alpha/nefehiekhccmedmdoilmhikhdiiijkbe?hl=en" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Alpha</a><br>
                    <a href="https://chrome.google.com/webstore/detail/gb-browser/jnmipkhdnlcnfllifhlohfigomcpcmhc?hl=en" rel="noreferrer noopener nofollow" target="_blank">GB Browser</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser/jgofbeaahhiapondaabffdhppadnimcm?hl=en" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser (mirror)</a><br>
                    <a href="https://chrome.google.com/webstore/detail/byte-browser-20/lfgcgehnjbgjeigjldphnaaddjjmfali?hl=en" rel="noreferrer noopener nofollow" target="_blank">Byte Browser 2.0</a><br>
                    <a href="https://chrome.google.com/webstore/detail/alpha-browser-20/bfbobdlagdgbknpjoeidaefbhjcengjg?hl=en" rel="noreferrer noopener nofollow" target="_blank">Alpha Browser 2.0</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser-alpha/dckeopcgdjpomnfiilhlladijgfjafed" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Alpha (mirror)</a><br>
                    <a href="https://github.com/s0/leaf-browser" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Source Code</a><br><br>
                </div>
                <div id="URLBlacklist" class="tabcontentunrestrict">
                    <h3>URLBlacklist</h3>
                    <a href="https://cloud.google.com/docs/chrome-enterprise/policies/?policy=URLBlacklist" rel="noreferrer noopener nofollow" target="_blank">https://cloud.google.com/docs/chrome-enterprise/policies/?policy=URLBlacklist</a><br>
                    <label>Ways to access chrome policy blocked websites:</label><br>
                    <label>*Browser-in-browser: works on Chrome, Firefox, & Cloud Internet Explorer</label><br>
                    <a class="barbutton" href="#Off-site-Proxy">Off-site Proxy</a>
                    <a class="barbutton" href="#Browser-in-browser" onclick="openMethod(event, 'Browser-in-browser')">Browser-in-browser</a>
                    <a class="barbutton" href="#VM-Emulator" onclick="openMethod(event, 'VM-Emulator')">Virtual Machine / Emulator</a><br><br>
                </div>
            </div>
            <br>
            <h4 id="goguardian">GoGuardian</h4>
            <div class="selection">
                <div class="tabunrestrict">
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'unblockWebsites')">Unblock Websites</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'preventTracking')">Prevent Tracking</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'removeGoguardian')">Remove GoGuardian</button>
                    <button class="tablinksunrestrict" onclick="openMethod(event, 'knowledgeBase')">Knowledge Base</button>
                </div>
                <div id="unblockWebsites" class="tabcontentunrestrict">
                    <h3>Unblock GoGuardian Blocked Websites</h3>
                    <label>GoGuardian blocks websites that accessed using address bar</label><br>
                    <textarea style="width: 650px; height: 75px; resize: none; background-color: white;" disabled>chrome.tabs.query({'active': true, 'currentWindow': true}, function (tabs) {
    var tab = tabs[0];
    var url = tab.url;
});</textarea><br>
                    <label>Ways to access GoGuardian blocked websites:</label><br>
                    <a class="barbutton" href="#iframe-browser">Access on Iframe</a>
                    <a class="barbutton" href="#Off-site-Proxy">Off-site Proxy</a><br>
                    <a class="barbutton" href="#Browser-in-browser" onclick="openMethod(event, 'Browser-in-browser')">Browser-in-browser</a>
                    <a class="barbutton" href="#VM-Emulator" onclick="openMethod(event, 'VM-Emulator')">Virtual Machine / Emulator</a><br><br>
                    <label>ChromeApp-Based Browser</label><br>
                    <a href="https://chrome.google.com/webstore/detail/bit-browser/igidaonkecelbangcglegdalgmbjgiio?hl=en" rel="noreferrer noopener nofollow" target="_blank">Bit Browser</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser-alpha/nefehiekhccmedmdoilmhikhdiiijkbe?hl=en" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Alpha</a><br>
                    <a href="https://chrome.google.com/webstore/detail/gb-browser/jnmipkhdnlcnfllifhlohfigomcpcmhc?hl=en" rel="noreferrer noopener nofollow" target="_blank">GB Browser</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser/jgofbeaahhiapondaabffdhppadnimcm?hl=en" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser (mirror)</a><br>
                    <a href="https://chrome.google.com/webstore/detail/byte-browser-20/lfgcgehnjbgjeigjldphnaaddjjmfali?hl=en" rel="noreferrer noopener nofollow" target="_blank">Byte Browser 2.0</a><br>
                    <a href="https://chrome.google.com/webstore/detail/alpha-browser-20/bfbobdlagdgbknpjoeidaefbhjcengjg?hl=en" rel="noreferrer noopener nofollow" target="_blank">Alpha Browser 2.0</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser-alpha/dckeopcgdjpomnfiilhlladijgfjafed" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Alpha (mirror)</a><br>
                    <a href="https://github.com/s0/leaf-browser" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Source Code</a><br><br>
                </div>
                <div id="preventTracking" class="tabcontentunrestrict">
                    <h3>Prevent Tracking</h3>
                    <label>As far as I research, GoGuardian tracks websites that accessed using address bar</label><br>
                    <textarea style="width: 650px; height: 75px; resize: none; background-color: white;" disabled>chrome.tabs.query({'active': true, 'currentWindow': true}, function (tabs) {
    var tab = tabs[0];
    var url = tab.url;
});</textarea><br>
                    <label>Ways to access web without being tracked by GoGuardian:</label><br>
                    <label>*Off-site Proxy: Prevent using unencrypted off-site proxy query</label><br>
                    <a class="barbutton" href="#iframe-browser">Access on Iframe</a>
                    <a class="barbutton" href="#Off-site-Proxy">Off-site Proxy</a><br>
                    <a class="barbutton" href="#Browser-in-browser" onclick="openMethod(event, 'Browser-in-browser')">Browser-in-browser</a>
                    <a class="barbutton" href="#VM-Emulator" onclick="openMethod(event, 'VM-Emulator')">Virtual Machine / Emulator</a><br><br>
                    <label>ChromeApp-Based Browser</label><br>
                    <a href="https://chrome.google.com/webstore/detail/bit-browser/igidaonkecelbangcglegdalgmbjgiio?hl=en" rel="noreferrer noopener nofollow" target="_blank">Bit Browser</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser-alpha/nefehiekhccmedmdoilmhikhdiiijkbe?hl=en" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Alpha</a><br>
                    <a href="https://chrome.google.com/webstore/detail/gb-browser/jnmipkhdnlcnfllifhlohfigomcpcmhc?hl=en" rel="noreferrer noopener nofollow" target="_blank">GB Browser</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser/jgofbeaahhiapondaabffdhppadnimcm?hl=en" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser (mirror)</a><br>
                    <a href="https://chrome.google.com/webstore/detail/byte-browser-20/lfgcgehnjbgjeigjldphnaaddjjmfali?hl=en" rel="noreferrer noopener nofollow" target="_blank">Byte Browser 2.0</a><br>
                    <a href="https://chrome.google.com/webstore/detail/alpha-browser-20/bfbobdlagdgbknpjoeidaefbhjcengjg?hl=en" rel="noreferrer noopener nofollow" target="_blank">Alpha Browser 2.0</a><br>
                    <a href="https://chrome.google.com/webstore/detail/leaf-browser-alpha/dckeopcgdjpomnfiilhlladijgfjafed" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Alpha (mirror)</a><br>
                    <a href="https://github.com/s0/leaf-browser" rel="noreferrer noopener nofollow" target="_blank">Leaf Browser Source Code</a><br><br>
                </div>
                <div id="removeGoguardian" class="tabcontentunrestrict">
                    <h3>Remove GoGuardian</h3>
                    <label>Ways to remove GoGuardian:</label><br>
                    <label>1. Using Developer Tools (Available if 'DeveloperToolsAvailability' is set to '1' in chrome policy)</label><br>
                    <label>Go to http://chrome://inspect/#extensions and then find GoGuardian. Click “inspect”. There will be a series of topics on the top, click “console”. Then, at the bottom there is a type pad. Write down: window.close(true) THEN BOOM. It’s gone.</label><br>
                    <img id="rgimage1" class="clickable" src="https://i.ytimg.com/vi/sxisvZu_q5U/sddefault.jpg" width="100%" height="407.25px" title="Click to watch" onclick="deployrgframe1()">
                    <iframe id="rgframe1" name="rgframe1" width="100%" height="407.25px" style="display:none;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true" mozallowfullscreen="true" msallowfullscreen="true" oallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                    <a href="https://invidious.zapashcanon.fr/embed/sxisvZu_q5U" target="rgframe1">Default server</a><label> • </label><a href="https://invidio.us/embed/sxisvZu_q5U" target="rgframe1">Servers List</a><br><br>
                    <label>2. Enter & Get Back from developer mode (deprecated)</label><br>
                    <label>(THIS STEP WILL ERASE ALL YOUR CHROMEBOOK DATA!) Press esc + reload + power, then press ctrl + d, after that press enter to turn os verification off and then press enter again to turn os verification on. After your device rebooted, GoGuardian should come back in about 1 minute. When it comes back, suddenly press reload and power. Sign in again and you will be fine.</label><br>
                    <img id="rgimage2" class="clickable" src="https://i.ytimg.com/vi/62RaTB_a89k/sddefault.jpg" width="100%" height="407.25px" title="Click to watch" onclick="deployrgframe2()">
                    <iframe id="rgframe2" name="rgframe2" width="100%" height="407.25px" style="display:none;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true" mozallowfullscreen="true" msallowfullscreen="true" oallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                    <a href="https://invidious.zapashcanon.fr/embed/62RaTB_a89k" target="rgframe2">Default server</a><label> • </label><a href="https://invidio.us/embed/62RaTB_a89k" target="rgframe2">Servers List</a><br>
                </div>
                <div id="knowledgeBase" class="tabcontentunrestrict">
                    <h3>Knowledge Base</h3>
                    <label>Latest GoGuardian Source Code:</label><br>
                    <a href="<?php echo $latest_gg_sc; ?>" rel="noreferrer noopener nofollow" target="_blank"><?php echo $latest_gg_sc; ?></a><br><br>
                    <label>Latest GoGuardian Extension</label><br>
                    <a href="<?php echo $latest_gg_ver; ?>" rel="noreferrer noopener nofollow"><?php echo $latest_gg_ver; ?></a><br><br>
                    <label>Latest GoGuardian Version</label><br>
                    <a href="https://ext.goguardian.com/stable.xml" rel="noreferrer noopener nofollow" target="_blank">https://ext.goguardian.com/stable.xml</a><br><br>
                    <label>GoGuardian Overview</label><br>
                    <video preload="none" title="Click play to load video" src="https://web.archive.org/web/20201109093305if_/https://embed-ssl.wistia.com/deliveries/14358ab121522b13511d1a6c17979b0326debe69.mp4" controls></video><br>
                    <img id="ggimg" class="clickable" title="Fullscreen" onclick="changeset('ggimg')" src="https://web.archive.org/web/20200922145414if_/https://www.goguardian.com/static/bdc39cd4cea618b9311eeb8bc875b940/5a23b/Admin-Dashboard.png">
                    <label>GoGuardian Web Filtering</label><br>
                    <video preload="none" title="Click play to load video" src="https://web.archive.org/web/20201109093856if_/https://embed-ssl.wistia.com/deliveries/be2faac3d879f4c8a1f6e0ef0600d78bad6592d0.mp4" controls></video><br>
                </div>
            </div>
            <br><br>
            <h2 id="support_us">Support US!</h2>
            <h4>Support us with donation</h4>
            <div class="selection">
                <div class="tabunrestrict">
                  <button class="tablinksunrestrict" onclick="openMethod(event, 'BTC')">BTC</button>
                  <button class="tablinksunrestrict" onclick="openMethod(event, 'USD-D')">USD-D</button>
                  <button class="tablinksunrestrict" onclick="openMethod(event, 'USDT')">USDT</button>
                  <button class="tablinksunrestrict" onclick="openMethod(event, 'BCH')">BCH</button>
                  <button class="tablinksunrestrict" onclick="openMethod(event, 'ETH')">ETH</button>
                  <button class="tablinksunrestrict" onclick="openMethod(event, 'XLM')">XLM</button>
                  <button class="tablinksunrestrict" onclick="openMethod(event, 'BAT')">BAT</button>
                  <button class="tablinksunrestrict" onclick="openMethod(event, 'AFF')">AFF</button>
                </div>
                <div id="BTC" class="tabcontentunrestrict">
                  <h3>Bitcoin</h3>
                  <br>
                  <img id="BTCimage" class="clickable" onclick="changeset('BTCimage')" src="https://miniurl.id/assets/img/currency/btc.png" alt="BTC" title="15vaKWVnztVQNL4c7BDmpHeRtrwRk9dA2g">
                  <br>
                  <br>
                  <div>
					<div>
						<input type="text" id="BTCaddress" size="35px" readonly value="15vaKWVnztVQNL4c7BDmpHeRtrwRk9dA2g">
					</div>
					<div>
						<button type="button" class="barbutton" onclick="copyAddress('BTCaddress')">Copy</button>
					</div>
				  </div>
				  <a href="bitcoin:15vaKWVnztVQNL4c7BDmpHeRtrwRk9dA2g">₿ BTC: 15vaKWVnztVQNL4c7BDmpHeRtrwRk9dA2g</a><br>
				  <a rel="noopener noreferrer nofollow" href="https://www.blockchain.com/btc/payment_request?address=15vaKWVnztVQNL4c7BDmpHeRtrwRk9dA2g&amount=0.00007687" target="_blank">Pay with Blockchain.com</a>
                </div>
                <div id="USD-D" class="tabcontentunrestrict">
                  <h3>USD Digital</h3>
                  <br>
                  <img id="USD-Dimage" class="clickable" onclick="changeset('USD-Dimage')" src="https://miniurl.id/assets/img/currency/usd-d.png" alt="USD-D" title="0xfC5094c16676d0630B061FF7129A100C21EE1F01">
                  <br>
                  <br>
                  <div>
					<div>
						<input type="text" id="USD-Daddress" size="41px" readonly value="0xfC5094c16676d0630B061FF7129A100C21EE1F01">
					</div>
					<div>
						<button type="button" class="barbutton" onclick="copyAddress('USD-Daddress')">Copy</button>
					</div>
				  </div>
                </div>
                <div id="USDT" class="tabcontentunrestrict">
                  <h3>Tether (USD Token)</h3>
                  <br>
                  <img id="USDTimage" class="clickable" onclick="changeset('USDTimage')" src="https://miniurl.id/assets/img/currency/usdt.png" alt="USDT" title="0xfC5094c16676d0630B061FF7129A100C21EE1F01">
                  <br>
                  <br>
                  <div>
					<div>
						<input type="text" size="41px" id="USDTaddress" readonly value="0xfC5094c16676d0630B061FF7129A100C21EE1F01">
					</div>
					<div>
						<button type="button" class="barbutton" onclick="copyAddress('USDTaddress')">Copy</button>
					</div>
				  </div>
                </div>
                <div id="BCH" class="tabcontentunrestrict">
                  <h3>Bitcoin Cash</h3>
                  <br>
                  <img id="BCHimage" class="clickable" onclick="changeset('BCHimage')" src="https://miniurl.id/assets/img/currency/bch.png" alt="BCH" title="qqmqyhxdr6d2l3lgcefk9894z53ksjfshyhkwgxuxs">
                  <br>
                  <br>
                  <div>
					<div>
						<input type="text" id="BCHaddress" readonly size="37px" value="qqmqyhxdr6d2l3lgcefk9894z53ksjfshyhkwgxuxs">
					</div>
					<div>
						<button type="button" class="barbutton" onclick="copyAddress('BCHaddress')">Copy</button>
					</div>
				  </div>
				  <a href="bitcoincash:qqmqyhxdr6d2l3lgcefk9894z53ksjfshyhkwgxuxs">₿ BCH: qqmqyhxdr6d2l3lgcefk9894z53ksjfshyhkwgxuxs</a><br>
				  <a rel="noopener noreferrer nofollow" href="https://www.blockchain.com/bch/payment_request?address=qqmqyhxdr6d2l3lgcefk9894z53ksjfshyhkwgxuxs&amount=0.0037" target="_blank">Pay with Blockchain.com</a>
                </div>
                <div id="ETH" class="tabcontentunrestrict">
                  <h3>Ethereum</h3><br>
                  <img id="ETHimage" class="clickable" onclick="changeset('ETHimage')" src="https://miniurl.id/assets/img/currency/eth.png" alt="ETH" title="0xfC5094c16676d0630B061FF7129A100C21EE1F01">
                  <br>
                  <br>
                  <div>
					<div>
						<input type="text" id="ETHaddress" size="41px" readonly value="0xfC5094c16676d0630B061FF7129A100C21EE1F01">
					</div>
					<div>
						<button type="button" class="barbutton" onclick="copyAddress('ETHaddress')">Copy</button>
					</div>
				  </div>
                </div>
                <div id="XLM" class="tabcontentunrestrict">
                  <h3>Stellar</h3><br>
                  <img id="XLMimage" class="clickable" onclick="changeset('XLMimage')" src="https://miniurl.id/assets/img/currency/xlm.png" alt="XLM" title="GAZZQVYOGUAEIQCT4ZDC7XEVB7QE4R54BZGWPXTBTQEBVUALKQF726IO">
                  <br>
                  <br>
                  <div>
					<div>
						<input type="text" id="XLMaddress" size="66px" readonly value="GAZZQVYOGUAEIQCT4ZDC7XEVB7QE4R54BZGWPXTBTQEBVUALKQF726IO">
					</div>
					<div>
						<button type="button" class="barbutton" onclick="copyAddress('XLMaddress')">Copy</button>
					</div>
				  </div>
                </div>
                <div id="BAT" class="tabcontentunrestrict">
                  <h3>Basic Attention Token</h3>
                  <br>
                  <a href="https://miniurl.id/bravebrowser" target="_blank" title="Brave"><img id="BATimage" class="clickable" src="https://miniurl.id/assets/img/currency/brave.jpg" style="width:75%;" alt="Brave"></a>
                  <br>
                  <br>
                  <label><a href="https://miniurl.id/bravebrowser" target="_blank">Download</a> Brave Browser, click Brave Rewards icon, and send us a tip!</label>
                </div>
                <div id="AFF" class="tabcontentunrestrict">
                  <h3>Affiliate Links</h3>
                  <br>
                  <a href="https://miniurl.id/aads" target="_blank" title="A-Ads">A-Ads</a><br>
                  <a href="https://miniurl.id/ardetamedia" target="_blank" title="Ardetamedia">Ardetamedia</a><br>
                  <a href="https://miniurl.id/niagahoster" target="_blank" title="Niagahoster">Niagahoster</a><br>
                  <a href="https://miniurl.id/freebitcoin" target="_blank" title="FreeBitco.in">FreeBitco.in</a><br>
                  <a href="https://miniurl.id/bravebrowser" target="_blank" title="Brave">Brave</a><br>
                  <a href="https://miniurl.id/skrill" target="_blank" title="Skrill">Skrill</a><br>
                  <a href="https://miniurl.id/buzzbreak" target="_blank" title="BuzzBreak">BuzzBreak</a><br>
                  <a href="https://miniurl.id/shutterstock" target="_blank" title="ShutterStock">ShutterStock</a><br>
                  <a href="https://miniurl.id/windscribe" target="_blank" title="Windscribe">Windscribe</a><br>
                  <a href="https://miniurl.id/myIM3" target="_blank" title="myIM3">myIM3</a><br>
                  <a href="https://miniurl.id/000webhost" target="_blank" title="000webhost">000webhost</a><br>
                  <a href="https://miniurl.id/shopback" target="_blank" title="Shopback">Shopback</a><br>
                  <a href="https://miniurl.id/popslide" target="_blank" title="Popslide">Popslide</a><br>
                  <a href="https://miniurl.id/honeygain" target="_blank" title="Honeygain">Honeygain</a>
                </div>
		<br><br>
                <h2 id="contact_us">Contact Us!</h2>
                <span id="e508539393">[javascript protected email address, please turn on your javascript to display email address!]</span><script type="text/javascript">/*<![CDATA[*/eval("var a=\"IoqdsG8jQJ+W9epVETYiNla7FBKR5m@h6f-AMuCr24gXxwSk1vUbOcPyz0t.3ZDn_HL\";var b=a.split(\"\").sort().join(\"\");var c=\"QdxxSwdXow4S4ojXjQoWg8wow9dG8ssdWds9e4PyP4xxHqcw\";var d=\"\";for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));document.getElementById(\"e508539393\").innerHTML=\"<a target=\\\"_blank\\\" href=\\\"mailto:\"+d+\"\\\">\"+d+\"</a>\"")/*]]>*/</script>
            </div>            
            <div style="padding-bottom: 160px;">
            </div>
            <form id="unrestrictAlternative" action="https://miniurl.id/norobots/dictionary?word=unrestrict&ref=github_php" method="POST" target="_blank">
                <input type="hidden" name="token" value="thisistokenvalue">
            </form>
            <form id="watchproxy" action="https://miniurl.id/norobots/edpuzzle?page=dashboard&ref=github_php" method="POST" target="_blank">
                <input type="hidden" name="token" value="thisistokenvalue">
            </form>
        </center>
        <script>
            var urlraw = window.location.href;
            var newurlraw = new URL(urlraw);
            var sectionparamvalue = newurlraw.searchParams.get("section");
            if (sectionparamvalue != null && sectionparamvalue != "") {
                openMethod(event, sectionparamvalue);
            }
            var targetparamvalue = newurlraw.searchParams.get("target");
            function replaceBlank() {
                var x = document.querySelectorAll('a[target="_blank"]');
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].setAttribute("target", "_self");
                }
            }
            if (targetparamvalue == "self") {
                replaceBlank();
            }
            document.getElementById('search_form_homepage').onsubmit = function() {
                var iframe = document.getElementById('frame');
                iframe.src = document.getElementById('urlinput').value;
                document.getElementById('buttonframe1').style = 'display:block;';
                document.getElementById('buttonframe2').style = 'display:block;';
                document.getElementById('frame').style = 'display:block;';
                return false;
            }
            function fullScreenRequest(id) {
                if (document.getElementById(id).requestFullscreen) {
                    document.getElementById(id).requestFullscreen();
                } else if (document.getElementById(id).mozRequestFullScreen) {
                    document.getElementById(id).mozRequestFullScreen();
                } else if (document.getElementById(id).webkitRequestFullscreen) {
                    document.getElementById(id).webkitRequestFullscreen();
                } else if (document.getElementById(id).msRequestFullscreen) {
                    document.getElementById(id).msRequestFullscreen();
                }
            }
            function closeFullscreen() {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
            function clearIframe() {
                document.getElementById('buttonframe1').style = 'display:none;';
                document.getElementById('buttonframe2').style = 'display:none;';
                document.getElementById('frame').style = 'display:none;';
            }
            function copyText(a) {
                var b = document.createElement('textarea');
                c = document.getSelection();
                b.textContent = a;
                document.body.appendChild(b);
                c.removeAllRanges();
                b.select();
                document.execCommand('copy');
                c.removeAllRanges();
                document.body.removeChild(b);
            }
            function openMethod(evt, methodName) {
                var i, tabcontentunrestrict, tablinksunrestrict;
                tabcontentunrestrict = document.getElementsByClassName("tabcontentunrestrict");
                for (i = 0; i < tabcontentunrestrict.length; i++) {
                    tabcontentunrestrict[i].style.display = "none";
                }
                tablinksunrestrict = document.getElementsByClassName("tablinksunrestrict");
                for (i = 0; i < tablinksunrestrict.length; i++) {
                    tablinksunrestrict[i].className = tablinksunrestrict[i].className.replace(" active", "");
                }
                document.getElementById(methodName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById('server-option').onchange = function() {
                var optionval = document.getElementById('server-option').value;
                var actionval = "https://"; 
                actionval += optionval;
                actionval += ".proxysite.com/includes/process.php?action=update";
                document.getElementById('proxysiteform').setAttribute("action", actionval);
            }
            function servernl() {
                document.getElementById('hidemeform').setAttribute("action", "https://nl.hideproxy.me/includes/process.php?action=update");
            }
            function serverde() {
                document.getElementById('hidemeform').setAttribute("action", "https://de.hideproxy.me/includes/process.php?action=update");
            }
            function serverfi() {
                document.getElementById('hidemeform').setAttribute("action", "https://fi.hideproxy.me/includes/process.php?action=update");
            }
            var gameFrame = document.getElementById("gameframe");
            function openFrame() {
                document.getElementById('buttongameframe1').style = 'display:block;';
                document.getElementById('buttongameframe2').style = 'display:block;';
                document.getElementById('gameframe').style = 'display:block;';
                document.getElementById('buttonopenframe').style = 'display:none;';
            }
            function clearIframe2() {
                document.getElementById('buttongameframe1').style = 'display:none;';
                document.getElementById('buttongameframe2').style = 'display:none;';
                document.getElementById('gameframe').style = 'display:none;';
                document.getElementById('buttonopenframe').style = 'display:block;';
            }
            function enlarge(imgs) {
                var expandImg = document.getElementById("expandedImg");
                var imgText = document.getElementById("imgtext");
                expandImg.src = imgs.src;
                imgText.innerHTML = imgs.alt;
                expandImg.parentElement.style.display = "block";
            }
            function imgzoomin() {
                fullScreenRequest('containerforexpandedImg');
                document.getElementById("containerforexpandedImg").setAttribute("onclick", "hidelargeimg();");
            }
            function hidelargeimg() {
                closeFullscreen();
                document.getElementById('containerforexpandedImg').setAttribute('onclick', 'imgzoomin();');
            }
            function deployrgframe1() {
                document.getElementById("rgframe1").src = "https://invidious.zapashcanon.fr/embed/sxisvZu_q5U";
                document.getElementById("rgimage1").style = "display:none;";
                document.getElementById("rgframe1").style = "display:block;";
            }
            function deployrgframe2() {
                document.getElementById("rgframe2").src = "https://invidious.zapashcanon.fr/embed/62RaTB_a89k";
                document.getElementById("rgimage2").style = "display:none;";
                document.getElementById("rgframe2").style = "display:block;";
            }
            function changeset(id) {
                fullScreenRequest(id);
                document.getElementById(id).setAttribute('onclick', 'reset(id)')
            }
            function reset(id) {
                closeFullscreen();
                document.getElementById(id).setAttribute('onclick', 'changeset(id)')
            }
            function copyAddress(id) {
                copyText(document.getElementById(id).value);
                document.getElementById(id).select();
            }
        </script>
    </body>
</html>
