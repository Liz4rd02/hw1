<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    $gameName = $_POST["gameName"];
    $tagLine = $_POST["tagLine"];
    $puuid = $_POST["puuid"];
    echo "<span class='hidden' id='puuid'>".$puuid."</span>";
?>
<html>
    <head>
        <title>Summoner Stats - League of Legends</title>
        <link rel="stylesheet" href="mhw3.css">
        <link rel="stylesheet" href="summoner.css" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="mhw3.js" defer></script>
        <script src="api.js" defer></script>
    </head>

    <body class="dark">
        <article id="site">
            
            <header>
                <nav class="nav1">
                    <a href="https://www.op.gg/"><img src="https://s-lol-web.op.gg/images/icon/opgglogo.svg?v=1708681571653" id="opgg-logo"></a>
                    <img src="https://opgg-gnb.akamaized.net/static/images/icons/lol.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">
                    <h1>League of Legends</h1>

                    <section class="other-sites">
                        <a href="https://pal.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/pal.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Palword</a>
                        <a href="https://op.gg/desktop/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/dskapp.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Desktop</a>
                        <a href="https://tft.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/tft.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Teamfight Tatics</a>
                        <a href="https://valorant.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/val.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Valorant</a>
                        <a href="https://pubg.op.gg/" class="site-box" data-width-limit="1110"><img src="https://opgg-gnb.akamaized.net/static/images/icons/pubg.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">PUBG</a>
                        <a href="https://overwatch.op.gg/" class="site-box" data-width-limit="1240"><img src="https://opgg-gnb.akamaized.net/static/images/icons/overwatch.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">OVERWATCH2</a>
                        <a href="https://esports.op.gg/" class="site-box" data-width-limit="1350"><img src="https://opgg-gnb.akamaized.net/static/images/icons/esports.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Esports</a>
                        <a href="https://talk.op.gg/" class="site-box" data-width-limit="1425"><img src="https://opgg-gnb.akamaized.net/static/images/icons/talk.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Talk</a>
                        <a href="https://gigs.op.gg/" class="site-box" data-width-limit="1515"><img src="https://opgg-gnb.akamaized.net/static/images/icons/gigs.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Gigs</a>
                        <a href="https://duo.op.gg/" class="site-box" data-width-limit="1550"><img src="https://opgg-gnb.akamaized.net/static/images/icons/duo.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Duo</a>

                        <section id="header-ending">  
                            <div id="menu-wrapper">
                            <img src="https://s-lol-web.op.gg/images/icon/icon-more.svg?v=1708681571653" id="menu-img">
                            <div id="menu" class="hidden">
                                <a href="https://pal.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/pal.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Palword</a>
                                <a href="https://op.gg/desktop/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/dskapp.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Desktop</a>
                                <a href="https://tft.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/tft.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Teamfight Tatics</a>
                                <a href="https://valorant.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/val.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Valorant</a>
                                <a href="https://pubg.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/pubg.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">PUBG</a>
                                <a href="https://overwatch.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/overwatch.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">OVERWATCH2</a>
                                <a href="https://esports.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/esports.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Esports</a>
                                <a href="https://talk.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/talk.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Talk</a>
                                <a href="https://gigs.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/gigs.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Gigs</a>
                                <a href="https://duo.op.gg/" class="site-box"><img src="https://opgg-gnb.akamaized.net/static/images/icons/duo.svg?image=q_auto,f_webp,w_48,h_48&v=1708681571653">Duo</a>
                            </div>
                            </div>
                            <img src="https://s-lol-web.op.gg/images/icon/chatbot.gif" id="FAQ">
                            <!--
                            <div id="FAQ-info" class="hidden">
                                <span>Contact Us</span>
                                <a href="https://opgg.helpscoutdocs.com/collection/1-league-of-legends">Help Center</a>
                            </div>

                            SOSTITUITO CON CREAZIONE TRAMITE document.createElement()
                            -->
                            <img src="https://s-lol-web.op.gg/images/icon/icon-darkmode.svg" id="darkmode">
                            <div id="triangle" class="hidden"></div>
                            <div id="colorModeInfo" class="hidden">Dark mode</div>
                            <div id="lingua">
                                <img src="https://s-lol-web.op.gg/images/icon/icon-world-light-blue.svg?v=1708681571653">
                                <div id="scegli">     
                                    <span class="LanguageDependant">Italiano</span>  
                                    <div class="arrow"></div>
                                </div>
                                <div id="LanguageList" class="hidden">
                                    <span>English</span>
                                    <span>Italiano</span>
                                    <span>Français</span>
                                    <span>Español</span> 
                                    <span>Deutsch</span>
                                    <span>Nederlands</span> 
                                    <span>Język polski</span>
                                    <span>Português</span> 
                                    <span>Dansk</span>
                                </div>
                            </div>

                        
                            <a href="logout.php" id="login">Log out</a>
                            
                        </section>


                    </section>


                </nav>

                <nav id="searchNav">
                    <div>
                        <a href="https://www.op.gg/">
                            <img src = "https://meta-static.op.gg/logo/image/cd49dd968ddbafc09a810187a106edd1.png?image=q_auto,f_webp,w_580&v=1710914129937">
                        </a>

                        <section id="user-box" class="little">
                            <section id="region">
                             
                                    <span id="regionName">EUW</span>
                                    <div class="arrow"></div>
                                
                            </section>
                            <div id="RegionList" class="hidden">
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-na.svg?v=1710914129937">North America</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-euw.svg?v=1710914129937">Europe West</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-eune.svg?v=1710914129937">Europe Nordic & East</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-oce.svg?v=1710914129937">Oceania</span> 
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-kr.svg?v=1710914129937">Korea</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-jp.svg?v=1710914129937">Japan</span> 
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-br.svg?v=1710914129937">Brazil</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-las.svg?v=1710914129937">LAS</span> 
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-lan.svg?v=1710914129937">LAN</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-ru.svg?v=1710914129937">Russia</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-tr.svg?v=1710914129937">Türkiye</span> 
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-si.svg?v=1710914129937">Singapore</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-ph.svg?v=1710914129937">Philippines</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-ta.svg?v=1710914129937">Taiwan</span> 
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-vi.svg?v=1710914129937">Vietnam</span>
                                <span class="RegionOption"><img src="https://s-lol-web.op.gg/assets/images/regions/01-icon-icon-th.svg?v=1710914129937">Thailand</span>
                            </div>
                           
                            <section id="search">
                            <form>
                                <input type="text" id="formGameName" name="gameName">
                                <input type="hidden" name="summonerTag" value="">
                                <input type="hidden" name="summonerName" value="">
                                <span class="formspan">Game Name +</span>
                                <span id="gameTag" class="formspan">#EUW</span>
                                <input type="submit" id="submit">
                            </form>

                            <form id="summonerForm" action="Summoner.php" method="post">
                                <input type="hidden" name="gameName" value="">
                                <input type="hidden" name="tagLine" value="">
                                <input type="hidden" name="puuid" value="">
                                <input type="submit" id="submitButton">
                            </form>
                            </section>
                            <a href="https://www.op.gg/"><img src="https://s-lol-web.op.gg/images/icon/icon-gg.svg"></a>
                        </section>

                    </div>

                </nav>

            
                <nav class="nav2">
                    <div>

                        <div>
                            <a href="index.php" class="LanguageDependant">Home</a>
                            <a href="Champions.php" class="LanguageDependant">Champions</a>
                            <a href="https://www.op.gg/modes/aram" id="game-mode" class="LanguageDependant">Game Mode</a>
                            <a href="https://www.op.gg/statistics/champions" class="LanguageDependant">Statistiche</a>
                            <a href="https://www.op.gg/leaderboards/tier" class="LanguageDependant">Classifiche</a>
                            <a href="https://www.op.gg/spectate/live/pro-gamer" class="LanguageDependant">Pro Matches</a>
                            <a href="https://www.op.gg/multisearch" class="LanguageDependant">Multi-Search</a> 
                        </div>

                        <div>
                            <img src="http://127.0.0.1/user-icon.jpg">
                            <a id="mypage"><?php echo $_SESSION["username"];?></a>
                        </div>

                    </div>
                </nav> 
                  
            </header>

            <div id="profileHeader">
                <div id="profileHeaderContent">
                <div id="profileIconContainer">
                    <img id="profileIcon" src="">
                    <span id="profileLvl">1</span>
                </div>
                <div id="profileInfoContainer">
                    <div id="profileName">
                        <span id="GameName"><?php echo $gameName; ?></span>
                        <span id="tagLine"><?php echo $tagLine; ?></span>
                        <button id="favButton"
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "opgg_database") or die(mysqli_connect_error());

                            $query = "SELECT * FROM favourites WHERE username = '".$_SESSION['username']."' and summonerName = '". $puuid ."'";
                            $res = mysqli_query($conn, $query);

                            if(mysqli_num_rows($res)>0)echo "class='selected'";
                            mysqli_close($conn);
                        ?>
                        >
                            <img src="https://s-lol-web.op.gg/images/icon/icon-bookmark.svg?v=1715147216574">
                        </button>
                    </div>
                </div>


                    <div id="premiumBanner">
                        <img src="https://s-lol-web.op.gg/images/icon/icon-premium-symbol.svg?v=1708681571653">
                        <div id="advertisingBlock">
                            <span id="premium-logo">OP.GG Premium</span>
                            <span id="premium-beta">OPEN BETA</span>
                            <span id="premium-text" class="LanguageDependant">Usa OP.GG senza pubblicità, con funzionalità premium</span>
                        </div>
                    </div>
                </div>


                
            </div>
            <nav id="profileNav">
                <div id="profileNavContent">
                    <span>Summary</span>
                </div>
            </nav>

           
            <div id="background">
                <div id="mainContainer">
                    <div id="mainContent">
                        <section id="mainC1">
                            <div class="rankedInfoBox" data-ranked-type="solo">
                                <span>Ranked Solo</span>
                                <div>
                                    <div class="rankedEmblemContainer"><img src="https://raw.communitydragon.org/latest/plugins/rcp-fe-lol-profiles/global/default/profile_unranked_tooltip.png" class="rankedEmblem"></div>
                                    <div class="divisionInfo">
                                        <span class="tier">Unranked</span>
                                        <span class="leaguePoints"></span>
                                    </div>
                                    <div class="winrate">
                                        <span class="WL"></span>
                                        <span class="wrPerc"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="rankedInfoBox" data-ranked-type="flex">
                                <span>Ranked Flex</span>
                                <div>
                                    <div class="rankedEmblemContainer"><img src="https://raw.communitydragon.org/latest/plugins/rcp-fe-lol-profiles/global/default/profile_unranked_tooltip.png" class="rankedEmblem"></div>
                                    <div class="divisionInfo">
                                        <span class="tier">Unranked</span>
                                        <span class="leaguePoints"></span>
                                    </div>
                                    <div class="winrate">
                                        <span class="WL"></span>
                                        <span class="wrPerc"></span>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <section id="mainC2">
                            <nav id="matchesNav">
                                <span class="clicked">All</span>
                                <span>Ranked Solo/Duo</span>
                                <span>Ranked Flex</span>
                                <span>Other</span>
                            </nav>
                            <div id="totalStats" class="hidden">
                                <div id="winsLosses">
                                    <div id="wrNumbers">
                                        <span class="totGames"></span>
                                        <span class="wonGames"></span>
                                        <span class="lostGames"></span>
                                    </div>
                                    
                                    <div id="pie-chart">
                                        <div id="hole">
                                            <span></span>
                                        </div>
                                        <div id="slice"></div>
                                        <div id="slice2"></div>
                                        <div id="slicewinrate"></div>
                                        <div id="slicewinrate2" class="hidden"></div>
                                    </div>
                                </div>
                                <div id="averageScore">
                                    <div id="score1">
                                        <span class="kills"></span>
                                        <span>/</span>
                                        <span class="deaths"></span>
                                        <span>/</span>
                                        <span class="assists"></span>
                                    </div>
                                        
                                    <div id="score2">
                                        <span class="KDA"></span>
                                        <span>:1</span>
                                    </div>

                                    <div id="score3">
                                        <span>P/Kill</span>
                                        <span class="PKill"></span>
                                        <span>%</span>
                                    </div>
                                </div>
                                <div id="recentChampions"></div>
                                <div id="preferredPosition">
                                    <span>Preferred Position</span>
                                    <div id="barsContainer">
                                        <div class="top role">
                                            <div class="bar">
                                                <div class="blueBar"></div>
                                            </div>
                                            <img src="https://s-lol-web.op.gg/images/icon/icon-position-top.svg?v=1710914129937">
                                        </div>
                                        <div class="jun role">
                                            <div class="bar">
                                                <div class="blueBar"></div>
                                            </div>
                                            <img src="https://s-lol-web.op.gg/images/icon/icon-position-jungle.svg?v=1710914129937">
                                        </div>
                                        <div class="mid role">
                                            <div class="bar">
                                                <div class="blueBar"></div>
                                            </div>
                                            <img src="https://s-lol-web.op.gg/images/icon/icon-position-mid.svg?v=1710914129937">
                                        </div>
                                        <div class="bot role">
                                            <div class="bar">
                                                <div class="blueBar"></div>
                                            </div>
                                            <img src="https://s-lol-web.op.gg/images/icon/icon-position-adc.svg?v=1710914129937">
                                        </div>
                                        <div class="sup role">
                                            <div class="bar">
                                                <div class="blueBar"></div>
                                            </div>
                                            <img src="https://s-lol-web.op.gg/images/icon/icon-position-support.svg?v=1710914129937">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="match model">
                                <div class="matchStats"> 
                                    <div class="matchContent">
                                        <section class="Description">
                                            <span class="matchType"></span>
                                            <span class="date"></span>
                                            <div class="dividerLine"></div>
                                            <span class="result"></span>
                                            <span class="duration"></span>
                                        </section>
                                        <section class="main">
                                            <div class="mainUpper">
                                                <div class="champIcon">
                                                    <span></span>
                                                </div>
                                                <div class="summonersIcons">
                                                    <img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/spell/SummonerSmite.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="sum1">
                                                    <img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/spell/SummonerFlash.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="sum2">
                                                </div>
                                                <div class="runesIcons">
                                                    <img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/perk/8010.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="mainRune">
                                                    <img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/perkStyle/8100.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="secondaryRune">
                                                </div>
                                                <div class="scoreKDA">
                                                    <div class="score">
                                                        <span class="kills">8</span>
                                                        <span class="bar">/</span>
                                                        <span class="deaths">10</span>
                                                        <span class="bar">/</span>
                                                        <span class="assists">7</span>
                                                    </div>
                                                    <span class="KDA"></span>
                                                </div>
                                                <div class="otherStats">
                                                    <span class="PKill"></span>
                                                    <span class="wards"></span>
                                                    <span class="cs"></span>
                                                    <span class="elo"></span>
                                                </div>
                                            </div>
                                            <div class="mainLower">
                                                <div><img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/item/6672.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="item hidden" data-num="0"></div>
                                                <div><img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/item/6672.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="item hidden" data-num="1"></div>
                                                <div><img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/item/6672.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="item hidden" data-num="2"></div>
                                                <div><img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/item/6672.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="item hidden" data-num="3"></div>
                                                <div><img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/item/6672.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="item hidden" data-num="4"></div>
                                                <div><img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/item/6672.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="item hidden" data-num="5"></div>
                                                <img src="https://opgg-static.akamaized.net/meta/images/lol/14.7.1/item/3340.png?image=q_auto,f_webp,w_64,h_64&v=1710914129937" class="ward hidden">
                                            </div>
                                        </section>
                                        <section class="TeamList">
                                            <div class="team team1">
                                                
                                            </div>
                                            <div class="team team2" >
                                                
                                            </div>
                                        </section>
                                    </div>
                                    <div class="matchEnding">
                                        <div class="arrow"></div>
                                    </div>
                                    
                                </div>
                                <div class="moreStats hidden">
                                    <nav class="moreStatsNav">
                                        <span>Overview</span>
                                    </nav>
                                    <div class="moreStatsContent">
                                        <div class="teamStats team1">
                                            <div class="statsInfo">
                                                <span class="esitoPartita">
                                                    <span class="winOrLoss">Victory</span>
                                                    <span>(Ally Team)</span>
                                                </span>
                                                <span class="opScore">OP Score </span> 
                                                <span class="Kda">KDA</span> 
                                                <span class="damage">Damage</span> 
                                                <span class="wards">Wards</span> 
                                                <span class="cs">CS</span> 
                                                <span class="item">Item</span> 
                                            </div>
                                            <div class="fullStats">
                                            
                                            </div>
                                        </div>

                                        <div class="teamBars">
                                            <div class="objectives team1">
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                            </div>
                                            <div class="bars">
                                                <div class="totalKill bar">
                                                    <div class="enemyBar"></div>
                                                    <span class="myTeamStat"></span>
                                                    <span class="title">Total Kill</span>
                                                    <span class="enemyTeamStat"></span>
                                                </div>
                                                <div class="totalGold bar">
                                                    <div class="enemyBar"></div>
                                                    <span class="myTeamStat"></span>
                                                    <span class="title">Total Gold</span>
                                                    <span class="enemyTeamStat"></span>
                                                </div>
                                            </div>
                                            <div class="objectives team2">
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                                <div class="objItem"></div>
                                            </div>
                                        </div>

                                        <div class="teamStats team2">
                                            <div class="statsInfo">
                                                <span class="esitoPartita">
                                                    <span class="winOrLoss">Victory</span>
                                                    <span>(Enemy Team)</span>
                                                </span>
                                                <span class="opScore">OP Score </span> 
                                                <span class="Kda">KDA</span> 
                                                <span class="damage">Damage</span> 
                                                <span class="wards">Wards</span> 
                                                <span class="cs">CS</span> 
                                                <span class="item">Item</span> 
                                            </div>
                                            <div class="fullStats">
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="spaceRect">

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
               
                
                <div id="rect"></div>
                
                   
                    
            

                <footer>
                    <div>
                        <a href="https://www.op.gg/" id="footer-logo"><img src="https://s-lol-web.op.gg/images/icon/icon-opgglogo-gray.svg?v=1710914129937"></a>
                    </div>

                    <div>
                        <span id="footer-title">OP.GG</span>
                        <a href="https://www.op.gg/about">About OP.GG</a>
                        <a href="https://log.op.gg/company_en">Company</a>
                        <a href="https://log.op.gg/">Blog</a>
                        <a href="https://www.op.gg/logos">Cronologia dei loghi</a>
                    </div>

                    <div>
                        <span id="footer-title">Products</span>
                        <a href="https://op.gg/">League of Legends<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://tft.op.gg/">Teamfight Tatics<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://valorant.op.gg/">Valorant<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://pubg.op.gg/">PUBG<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://overwatch.op.gg/">OVERWATCH<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://esports.op.gg/">ESPORTS<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://talk.op.gg/">TALK<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://gigs.op.gg/">GIGS<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://duo.op.gg/">DUO<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                    </div>

                    <div>
                        <span id="footer-title">Apps</span>
                        <a href="https://op.gg/desktop">OP.GG for Desktop<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://pal.op.gg/">OP.GG Palword for Desktop<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://play.google.com/store/apps/details?id=gg.op.lol.android&referrer=utm_source%3Dadblock%26utm_medium%3Dbanner">OP.GG stats for Android<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://itunes.apple.com/kr/app/op-gg-%EC%98%A4%ED%94%BC%EC%A7%80%EC%A7%80/id605722237?mt=8">OP.GG stats for iOS<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://play.google.com/store/apps/details?id=gg.op.tft">OP.GG TFT for Android<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                        <a href="https://apps.apple.com/kr/app/allt/id6448737621">OP.GG TFT for iOS<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"></a>
                    </div>

                    <div>
                        <span id="footer-title">Resources</span>
                        <a href="https://www.op.gg/policies/privacy">Informativa sulla Privacy</a>
                        <a href="https://www.op.gg/policies/agreement">Accordo</a>
                        <a href="https://opgg.helpscoutdocs.com/collection/1-opgg">Aiuto</a>
                        <a href="service@op.gg">Email inquiry</a>
                        <a>Contact Us</a>
                    </div>

                    <div>
                        <span id="footer-title">More</span>
                        <a href="contact@op.gg">Business</a>
                        <a href="https://opgg.notion.site/Advertising-on-OP-GG-47e02da6b7eb438288730c92c14ef8f0">Advertise</a>
                    </div>

                    <div id="copyright">
                        <span>© 2012-2024 OP.GG. OP.GG is not endorsed by Riot Games and does not 
                                reflect the views or opinions of Riot Games or anyone officially 
                                involved in producing or managing League of Legends. League of Legends
                                and Riot Games are trademarks or registered trademarks of Riot Games,
                                Inc. League of Legends © Riot Games, Inc
                        </span>

                        <div id="social-media">
                            <a href="https://www.instagram.com/opgg_official">
                                <img src="https://s-lol-web.op.gg/images/icon/icon-logo-instagram.svg?v=1708681571653">
                            </a>

                            <a href="https://www.youtube.com/@opgg_official">
                                <img src="https://s-lol-web.op.gg/images/icon/icon-logo-youtube.svg?v=1708681571653">
                            </a>

                            <a href="https://twitter.com/opgg_official">
                                <img src="https://s-lol-web.op.gg/images/icon/icon-logo-x.svg?v=1708681571653">
                            </a>

                            <a href="https://www.facebook.com/opgg.official/">
                                <img src="https://s-lol-web.op.gg/images/icon/icon-logo-facebook.svg?v=1708681571653">
                            </a>

                            <a href="https://www.overwolf.com/oneapp/opgg-electron-app">
                                <img src="https://s-lol-web.op.gg/static/images/icon/logo/icon-logo-overwolf.svg?v=1708681571653">
                            </a>
                        </div>
                    </div>

                </footer> 
            </div>


        </article>


    </body>
</html>