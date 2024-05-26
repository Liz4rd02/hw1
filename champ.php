
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    $champName = $_POST["champName"];
    $gameVersion = $_POST["game_version"];
    $rest_url = "https://ddragon.leagueoflegends.com/cdn/".$gameVersion."/data/en_US/champion/".$champName.".json";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $rest_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    $champ_json = json_decode($result);

    $conn = mysqli_connect("localhost", "root", "", "opgg_database") or die(mysqli_connect_error());

    $query = "SELECT * FROM comments WHERE champName = '".$champName."'";
    $res = mysqli_query($conn, $query);
    
?>
<html>
    <head>
        <title>
            <?php 
                echo "LOL Champion - ".$champName
            ?>
        </title>
        <link rel="stylesheet" href="mhw3.css">
        <link rel="stylesheet" href="champions.css" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="mhw3.js" defer></script>
        <script src="champ.js" defer></script>
    </head>

    <body class="dark">
        <article id="ChampionsPage">

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
                            <a href="http://127.0.0.1/index.php" class="LanguageDependant">Home</a>
                            <a href="http://127.0.0.1/Champions.php" id="current-page" class="LanguageDependant">Champions</a>
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
                <div id="mainContent">
                    <div id="champImageContainer">
                        <div id="champImageShadow2"></div>
                        <img src= 
                        <?php 
                            $imageURL = "https://ddragon.leagueoflegends.com/cdn/img/champion/splash/".$champName."_0.jpg";
                            echo '"'.$imageURL.'"';
                        ?>
                        id="champImage">
                        <div id="champImageShadow"></div>
                    </div>
                    <div id="champTitle">
                        <span id="nameTitle">
                            <?php 
                                echo strtoupper($champ_json->data->$champName->title);
                            ?>
                        </span>
                        <span id="name">
                            <?php echo $champName;?>
                        </span>
                    </div>
                    <div id="champInfo">
                        <div id="tags">
                            <h2>Roles</h2>
                            <?php 
                                $tagsArray = $champ_json->data->$champName->tags;
                                
                                for($i=0; $i<count($tagsArray); $i++){
                                    echo "<span>".$tagsArray[$i]."</span>";
                                }
                            ?>
                        </div>

                        <div id="lore">
                            <h2>Lore</h2>
                            <span>
                                <?php 
                                    echo $champ_json->data->$champName->lore;    
                                ?>
                            </span>
                        </div>

                        <div id="allytips">
                            <h3>Ally tips</h3>
                            <?php 
                                $allytipsArray = $champ_json->data->$champName->allytips;
                                
                                for($i=0; $i<count($allytipsArray); $i++){
                                    echo "<span>- ".$allytipsArray[$i]."</span>";
                                }
                            ?>
                        </div>

                        <div id="enemytips">
                            <h3>Enemy tips</h3>
                            <?php 
                                $enemytipsArray = $champ_json->data->$champName->enemytips;
                                
                                for($i=0; $i<count($enemytipsArray); $i++){
                                    echo "<span>- ".$enemytipsArray[$i]."</span>";
                                }
                            ?>
                        </div>

                        <div id="abilities">
                            <h2>Abilities</h2>
                            <div id="abilitiesImgs">
                                <!-- <img src="https://ddragon.leagueoflegends.com/cdn/14.9.1/img/spell/TwitchFullAutomatic.png"> -->
                                <?php 
                                    $spells_array = $champ_json->data->$champName->spells;
                                    $spell_q = $spells_array[0];
                                    $spell_w = $spells_array[1];
                                    $spell_e = $spells_array[2];
                                    $spell_r = $spells_array[3];
                                    $spell_passive = $champ_json->data->$champName->passive;
                                
                                    $ability_img_url = "https://ddragon.leagueoflegends.com/cdn/".$gameVersion."/img/spell/";
                                    $passive_img_url = "https://ddragon.leagueoflegends.com/cdn/".$gameVersion."/img/passive/";

                                    echo "<img src='".$passive_img_url.$spell_passive->image->full."' class='selected passive'>";
                                    echo "<img src='".$ability_img_url.$spell_q->image->full."' class='q'>";
                                    echo "<img src='".$ability_img_url.$spell_w->image->full."' class='w'>";
                                    echo "<img src='".$ability_img_url.$spell_e->image->full."' class='e'>";
                                    echo "<img src='".$ability_img_url.$spell_r->image->full."' class='r'>";
                                ?>
                            </div> 
                            <div class="abilityInfo passive selected">
                                <span class="abilityPosition">Passive</span>
                                <span class="abilityName">
                                    <?php
                                        echo $spell_passive->name;
                                    ?>
                                </span>
                                <span class="abilityDescription">
                                    <?php
                                        echo $spell_passive->description;
                                    ?>
                                </span>
                            </div>

                            <div class="abilityInfo q hidden">
                                <span class="abilityPosition">Q</span>
                                <span class="abilityName">
                                    <?php
                                        echo $spell_q->name;
                                    ?>
                                </span>
                                <span class="abilityDescription">
                                    <?php
                                        echo $spell_q->description;
                                    ?>
                                </span>
                            </div>

                            <div class="abilityInfo w hidden">
                                <span class="abilityPosition">W</span>
                                <span class="abilityName">
                                    <?php
                                        echo $spell_w->name;
                                    ?>
                                </span>
                                <span class="abilityDescription">
                                    <?php
                                        echo $spell_w->description;
                                    ?>
                                </span>
                            </div>

                            <div class="abilityInfo e hidden">
                                <span class="abilityPosition">E</span>
                                <span class="abilityName">
                                    <?php
                                        echo $spell_e->name;
                                    ?>
                                </span>
                                <span class="abilityDescription">
                                    <?php
                                        echo $spell_e->description;
                                    ?>
                                </span>
                            </div>

                            <div class="abilityInfo r hidden">
                                <span class="abilityPosition">R</span>
                                <span class="abilityName">
                                    <?php
                                        echo $spell_r->name;
                                    ?>
                                </span>
                                <span class="abilityDescription">
                                    <?php
                                        echo $spell_r->description;
                                    ?>
                                </span>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                </div>
               
                <section id="commentSection">
                    <div id="csTitle">
                        <h2>View and share other tips or comments about this champion!</h2>
                        <form id="commentForm" method="post" action="champ.php">
                            <span>New Comment</span> 
                            <textarea id="comment" name="comment" value=""></textarea>
                            <input type="hidden" name="champName" value=<?php echo $champName; ?>>
                            <input type="hidden" name="game_version" value=<?php echo $gameVersion; ?>>
                            <input type="hidden" name="username" value=<?php echo $_SESSION["username"]; ?>>
                            <input type="submit" id="submitComment">
                        </form>
                    </div>
                    <?php
                        while($row = mysqli_fetch_assoc($res)){
                            echo ("<div class='newComment'>
                                        <div class='newCommentHeader'>
                                            <span class='newCommentUser'>".$row["username"]."</span>
                                            <span class='newCommentDate'>".$row["comment_date"]."</span>
                                            <span class='newCommentTime'>".$row["comment_time"]."</span>
                                        </div>
                                        <span class='newCommentContent'>".$row["comment_content"]."</span>");
                                        if($row["username"] == $_SESSION["username"])
                                        echo ("<span class='newCommentRemoveButton'>Remove Comment</span>");
                                    echo ("</div>");
                        }
                        
                    mysqli_free_result($res);
                    mysqli_close($conn);
                    ?>
                </section> 

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
