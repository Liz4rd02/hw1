<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
?>
<html>
    <head>
        <title>hw1</title>
        <link rel="stylesheet" href="mhw3.css" />
        
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="mhw3.js" defer></script>
    </head>

    <body class="dark">
        <article id="site">
            <div id="OauthApiMenuButton">
                <div class="arrow"></div>
            </div>

            <div id="modalView" class="hidden"></div>
            <div id="OauthApi" class="hidden">
                <span class="title">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/Wikipedia_logo_%28svg%29.svg/1200px-Wikipedia_logo_%28svg%29.svg.png">
                    Wikipedia: featured article of the day
                </span> 
               <div class="content"></div>
            </div>
            
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

            
                <nav class="nav2">
                    <div>

                        <div>
                            <a href="index.php" id="current-page" class="LanguageDependant">Home</a>
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


            <div id="background">
                <img src="https://meta-static.op.gg/logo/image/cd49dd968ddbafc09a810187a106edd1.png?image=q_auto,f_webp,w_auto,h_448&v=1710914129937" class="background-img">
                <section id="user-box">
                    <section id="region">
                        <span>Region</span>
                        <div>
                            <span id="regionName">Europe West</span>
                            <div class="arrow"></div>
                        </div>
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
                   
                    <span>|</span>
                    <section id="search">
                        <span>Search</span>
                        <div>
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
                        </div>
                    </section>
                    <a href="https://www.op.gg/"><img src="https://s-lol-web.op.gg/images/icon/icon-gg.svg"></a>
                </section>

                <a href="https://member.op.gg/membership?redirect_url=https://www.op.gg/" id="premium-box">
                    <img src="https://s-lol-web.op.gg/images/premium/opgg-premium-web.png?v=1708681571653" id="premium-img1">
                    <img src="https://s-lol-web.op.gg/images/icon/icon-premium-symbol.svg?v=1708681571653" id="premium-img2">
                    <div id="premium-advertising">
                        <span id="premium-logo">OP.GG Premium</span>
                        <span id="premium-beta">OPEN BETA</span>
                        <span id="premium-text" class="LanguageDependant">Usa OP.GG senza pubblicità, con funzionalità premium</span>
                        
                    </div>
                </a>

                <div id="rect"></div>
                <div id="rect2"> 
                    <section id="opgg-desktop">
                        <div id="ad">Experience the fast speed of OP.GG for Desktop!</div>
                        
                        <div id="features">
                            <span class="LanguageDependant">Impostazione automatica di rune in tempo reale</span>
                            <span class="LanguageDependant">Campioni più usati, gare a squadre e altro ancora</span>
                            <a href="https://bit.ly/2SnNShe">
                                <img src="https://s-lol-web.op.gg/static/images/site/home/2023img_index_01_en@2x.png?v=1708681571653">
                            </a>
                            <a href="https://bit.ly/2SnNShe">
                                <img src="https://s-lol-web.op.gg/static/images/site/home/2023img_index_02_en@2x.png?v=1708681571653">
                            </a>

                            <span class="LanguageDependant">Ultime raccomandazionidi Meta e OP.GG</span>
                            <span class="LanguageDependant">Funzionalità di sovrapposizione migliorate per maggiore praticità</span>
                            <a href="https://bit.ly/2SnNShe">
                                <img src="https://s-lol-web.op.gg/static/images/site/home/2023img_index_03_en@2x.png?v=1708681571653">
                            </a>
                            <a href="https://bit.ly/2SnNShe">
                                <img src="https://s-lol-web.op.gg/static/images/site/home/2023img_index_04_en@2x.png?v=1708681571653">
                            </a>
                        </div>
                    </section>
                    <section id="player-of-the-week">
                        <a id="title" href="https://esports.op.gg/players/1922/Chovy?hl=it_IT&utm_source=opgg&utm_medium=button&utm_campaign=click_playeroftheweek_epsports">
                            <img src="https://s-lol-web.op.gg/static/images/esports/logo-pow-white.svg?v=1710914129937" id="POW-logo">
                        </a>
                        <div id="standing">
                            <div class="standing-header">
                                <h4>Standing</h4>
                            </div>
                            <a class="team-list"></a>
                            <a class="team-list"></a>
                            <a class="team-list"></a>
                            <a class="team-list"></a>
                            <a class="team-list"></a>
                            <a class="team-list"></a>
                        </div>
                        <div id="schedule">
                            <div class="schedule-header">
                                <h4>Schedule</h4>
                            </div>
                            <a class="game-list"></a>
                            <a class="game-list"></a>
                        </div>
                    </section>
                </div>
            

                <footer>
                    <div>
                        <a href="https://www.op.gg/" id="footer-logo"><img src="https://s-lol-web.op.gg/images/icon/icon-opgglogo-white.svg?v=1708681571653"></a>
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
                        <a href="https://op.gg/">League of Legends<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://tft.op.gg/">Teamfight Tatics<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://valorant.op.gg/">Valorant<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://pubg.op.gg/">PUBG<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://overwatch.op.gg/">OVERWATCH<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://esports.op.gg/">ESPORTS<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://talk.op.gg/">TALK<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://gigs.op.gg/">GIGS<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://duo.op.gg/">DUO<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                    </div>

                    <div>
                        <span id="footer-title">Apps</span>
                        <a href="https://op.gg/desktop">OP.GG for Desktop<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://pal.op.gg/">OP.GG Palword for Desktop<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://play.google.com/store/apps/details?id=gg.op.lol.android&referrer=utm_source%3Dadblock%26utm_medium%3Dbanner">OP.GG stats for Android<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://itunes.apple.com/kr/app/op-gg-%EC%98%A4%ED%94%BC%EC%A7%80%EC%A7%80/id605722237?mt=8">OP.GG stats for iOS<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://play.google.com/store/apps/details?id=gg.op.tft">OP.GG TFT for Android<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
                        <a href="https://apps.apple.com/kr/app/allt/id6448737621">OP.GG TFT for iOS<img src="https://s-lol-web.op.gg/images/icon/icon-game-white.svg?v=1708681571653"></a>
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