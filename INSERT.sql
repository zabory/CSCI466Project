INSERT  INTO    HUMAN(FNAME, MNAME, LNAME, PHONE, EMAIL)
VALUE
        ('Isabella','Lee','Williams','6505130514','z1909177@students.niu.edu'),
        ('Jayden','','Brown','7792703338','jd1997@gmail.com'),
        ('Ava','Louise','Johnson','8302123892','alskjdi@gmail.com'),
        ('Stacy','Claire','Anderson','1209382307','StacyCA@yahoo.com'),
        ('Michael','Kai','Taylor','7791209239','68213@yahoo.com');

INSERT  INTO    ITEM(INAME,PRICE,IEDITION,ICONDITION,TAX,IDETAIL,TPRICE,REWARD)
VALUE
        # FIRST ITEM WITH 4 TYPES (NEW, PRE-OWNED, DIGITAL AND WITH 1 TYPE OF PLUS EXPANSION PASS)
        ('The Legend of Zelda: Breath of the Wild', '39.99', 'STANDARD', 'NEW', '5.99',
        'Forget everything you know about The Legend of Zelda games. Step into a world of discovery, exploration, and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across vast fields, through forests, and to mountain peaks as you discover what has become of the kingdom of Hyrule in this stunning Open-Air Adventure. Now on Nintendo Switch, your journey is freer and more open than ever. Take your system anywhere, and adventure as Link any way you like.'
        ,'45.98','3.99'
        ),
        ('The Legend of Zelda: Breath of the Wild', '37.99', 'STANDARD', 'PRE-OWNED', '5.69',
        'Forget everything you know about The Legend of Zelda games. Step into a world of discovery, exploration, and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across vast fields, through forests, and to mountain peaks as you discover what has become of the kingdom of Hyrule in this stunning Open-Air Adventure. Now on Nintendo Switch, your journey is freer and more open than ever. Take your system anywhere, and adventure as Link any way you like.'
        ,'43.68','3.79'
        ),
        ('The Legend of Zelda: Breath of the Wild', '39.99', 'STANDARD', 'DIGITAL', '5.99',
        'Forget everything you know about The Legend of Zelda games. Step into a world of discovery, exploration, and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across vast fields, through forests, and to mountain peaks as you discover what has become of the kingdom of Hyrule in this stunning Open-Air Adventure. Now on Nintendo Switch, your journey is freer and more open than ever. Take your system anywhere, and adventure as Link any way you like.'
        ,'45.98','3.99'
        ),
        ('The Legend of Zelda: Breath of the Wild', '79.98', 'PLUS EXPANSION PASS', 'DIGITAL', '11.99',
        'Forget everything you know about The Legend of Zelda games. Step into a world of discovery, exploration, and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across vast fields, through forests, and to mountain peaks as you discover what has become of the kingdom of Hyrule in this stunning Open-Air Adventure. Now on Nintendo Switch, your journey is freer and more open than ever. Take your system anywhere, and adventure as Link any way you like.'
        ,'91.97','7.99'
        ),

        # SECOND ITEM WITH 3 TYPES (NEW, PRE-OWNED, DIGITAL)
        ('New Super Mario Bros U Deluxe', '39.99', 'STANDARD', 'NEW', '5.99',
        'Join Mario, Luigi, and pals for single-player or multiplayer fun anytime, anywhere! Take on two family-friendly, side-scrolling adventures with up to three friends* as you try to save the Mushroom Kingdom. Includes the New Super Mario Bros. U game and harder, faster New Super Luigi U game—both of which include Nabbit and Toadette as playable characters!'
        ,'45.98','3.99'
        ),
        ('New Super Mario Bros U Deluxe', '37.99', 'STANDARD', 'PRE-OWNED', '5.69',
        'Join Mario, Luigi, and pals for single-player or multiplayer fun anytime, anywhere! Take on two family-friendly, side-scrolling adventures with up to three friends* as you try to save the Mushroom Kingdom. Includes the New Super Mario Bros. U game and harder, faster New Super Luigi U game—both of which include Nabbit and Toadette as playable characters!'
        ,'43.68','3.79'
        ),
        ('New Super Mario Bros U Deluxe', '39.99', 'STANDARD', 'DIGITAL', '5.99',
        'Join Mario, Luigi, and pals for single-player or multiplayer fun anytime, anywhere! Take on two family-friendly, side-scrolling adventures with up to three friends* as you try to save the Mushroom Kingdom. Includes the New Super Mario Bros. U game and harder, faster New Super Luigi U game—both of which include Nabbit and Toadette as playable characters!'
        ,'45.98','3.99'
        ),

        # THIRD ITEM WITH 3 TYPES (NEW, PRE-OWNED, DIGITAL)
        ('Kirby Star Allies', '39.99', 'STANDARD', 'NEW', '5.99',
        'When a new evil threatens Planet Popstar, Kirby will need a little help from his…enemies?! By making friends out of foes, up to three* players can drop in or out of the adventure at any time. With new and expanded copy abilities, classic Kirby action is deeper than ever: combine abilities with elements such as ice or fire to create new friend abilities! With tons of bosses and enemies standing in your way, Kirby has a new bag of tricks. Take baddies out by taking advantage of their elemental weaknesses.'
        ,'45.98','3.99'
        ),
        ('Kirby Star Allies', '37.99', 'STANDARD', 'PRE-OWNED', '5.69',
        'When a new evil threatens Planet Popstar, Kirby will need a little help from his…enemies?! By making friends out of foes, up to three* players can drop in or out of the adventure at any time. With new and expanded copy abilities, classic Kirby action is deeper than ever: combine abilities with elements such as ice or fire to create new friend abilities! With tons of bosses and enemies standing in your way, Kirby has a new bag of tricks. Take baddies out by taking advantage of their elemental weaknesses.'
        ,'43.68','3.79'
        ),
        ('Kirby Star Allies', '39.99', 'STANDARD', 'DIGITAL', '5.99',
        'When a new evil threatens Planet Popstar, Kirby will need a little help from his…enemies?! By making friends out of foes, up to three* players can drop in or out of the adventure at any time. With new and expanded copy abilities, classic Kirby action is deeper than ever: combine abilities with elements such as ice or fire to create new friend abilities! With tons of bosses and enemies standing in your way, Kirby has a new bag of tricks. Take baddies out by taking advantage of their elemental weaknesses.'
        ,'45.98','3.99'
        ),

        # 4TH ITEM WITH 3 TYPES (NEW, PRE-OWNED, DIGITAL)
        ('Fire Emblem: Three Houses', '39.99', 'STANDARD', 'NEW', '5.99',
        'Three territories. Three houses. Your very own journey. War is coming to the continent of Fódlan. Here, order is maintained by the Church of Seiros, which hosts the prestigious Officer’s Academy within its headquarters. You are invited to teach one of its three mighty houses, each comprised of students brimming with personality and represented by a royal from one of three territories. As their professor, you must lead your students in their academic lives and in turn-based, tactical RPG battles wrought with strategic, new twists to overcome. Which house, and which path, will you choose? Nintendo Switch Online membership (sold separately) and Nintendo Account required for online play. Not available in all countries. Internet access required for online features. Terms apply. nintendo.com/switch-online ©2019 Nintendo / INTELLIGENT SYSTEMS. Co-developed by KOEI TECMO GAMES CO., LTD. Fire Emblem and Nintendo Switch are trademarks of Nintendo. © 2019 Nintendo.'
        ,'45.98','3.99'
        ),
        ('Fire Emblem: Three Houses', '37.99', 'STANDARD', 'PRE-OWNED', '5.69',
        'Three territories. Three houses. Your very own journey. War is coming to the continent of Fódlan. Here, order is maintained by the Church of Seiros, which hosts the prestigious Officer’s Academy within its headquarters. You are invited to teach one of its three mighty houses, each comprised of students brimming with personality and represented by a royal from one of three territories. As their professor, you must lead your students in their academic lives and in turn-based, tactical RPG battles wrought with strategic, new twists to overcome. Which house, and which path, will you choose? Nintendo Switch Online membership (sold separately) and Nintendo Account required for online play. Not available in all countries. Internet access required for online features. Terms apply. nintendo.com/switch-online ©2019 Nintendo / INTELLIGENT SYSTEMS. Co-developed by KOEI TECMO GAMES CO., LTD. Fire Emblem and Nintendo Switch are trademarks of Nintendo. © 2019 Nintendo.'
        ,'43.68','3.79'
        ),
        ('Fire Emblem: Three Houses', '39.99', 'STANDARD', 'DIGITAL', '5.99',
        'Three territories. Three houses. Your very own journey. War is coming to the continent of Fódlan. Here, order is maintained by the Church of Seiros, which hosts the prestigious Officer’s Academy within its headquarters. You are invited to teach one of its three mighty houses, each comprised of students brimming with personality and represented by a royal from one of three territories. As their professor, you must lead your students in their academic lives and in turn-based, tactical RPG battles wrought with strategic, new twists to overcome. Which house, and which path, will you choose? Nintendo Switch Online membership (sold separately) and Nintendo Account required for online play. Not available in all countries. Internet access required for online features. Terms apply. nintendo.com/switch-online ©2019 Nintendo / INTELLIGENT SYSTEMS. Co-developed by KOEI TECMO GAMES CO., LTD. Fire Emblem and Nintendo Switch are trademarks of Nintendo. © 2019 Nintendo.'
        ,'45.98','3.99'
        ),
        ('Fire Emblem: Three Houses', '84.98', 'PLUS EXPANSION PASS', 'DIGITAL', '12.75',
        'Three territories. Three houses. Your very own journey. War is coming to the continent of Fódlan. Here, order is maintained by the Church of Seiros, which hosts the prestigious Officer’s Academy within its headquarters. You are invited to teach one of its three mighty houses, each comprised of students brimming with personality and represented by a royal from one of three territories. As their professor, you must lead your students in their academic lives and in turn-based, tactical RPG battles wrought with strategic, new twists to overcome. Which house, and which path, will you choose? Nintendo Switch Online membership (sold separately) and Nintendo Account required for online play. Not available in all countries. Internet access required for online features. Terms apply. nintendo.com/switch-online ©2019 Nintendo / INTELLIGENT SYSTEMS. Co-developed by KOEI TECMO GAMES CO., LTD. Fire Emblem and Nintendo Switch are trademarks of Nintendo. © 2019 Nintendo.'
        ,'97.73','8.49'
        ),

        # 4TH ITEM WITH 3 TYPES (NEW, PRE-OWNED, DIGITAL)
        ('Xenoblade Chronicles: Definitive Edition', '39.99', 'STANDARD', 'NEW', '5.99',
        'Discover the origins of Shulk as he and his companions clash against a seemingly-unstoppable mechanical menace. Wield a future-seeing blade, chain together attacks, and carefully position your party members in strategic, real-time combat as you journey across a massive world. Xenoblade Chronicles: Future Connected takes place one year after the main story and delves deeper into the relationship between Shulk and Melia in the face of a mysterious new threat.'
        ,'45.98','3.99'
        ),
        ('Xenoblade Chronicles: Definitive Edition', '37.99', 'STANDARD', 'PRE-OWNED','5.69',
        'Discover the origins of Shulk as he and his companions clash against a seemingly-unstoppable mechanical menace. Wield a future-seeing blade, chain together attacks, and carefully position your party members in strategic, real-time combat as you journey across a massive world. Xenoblade Chronicles: Future Connected takes place one year after the main story and delves deeper into the relationship between Shulk and Melia in the face of a mysterious new threat.'
        ,'43.68','3.79'
        ),
        ('Xenoblade Chronicles: Definitive Edition', '39.99', 'STANDARD', 'DIGITAL','5.99',
        'Discover the origins of Shulk as he and his companions clash against a seemingly-unstoppable mechanical menace. Wield a future-seeing blade, chain together attacks, and carefully position your party members in strategic, real-time combat as you journey across a massive world. Xenoblade Chronicles: Future Connected takes place one year after the main story and delves deeper into the relationship between Shulk and Melia in the face of a mysterious new threat.'
        ,'45.98','3.99'
        ),

        # 5TH ITEM WITH 3 TYPES (NEW, PRE-OWNED, DIGITAL)
        ('Splatoon 2', '39.99', 'STANDARD', 'NEW', '5.99',
        'Ink-splatting action is back and fresher than ever The squid kids called Inklings are back to splat more ink and claim more turf in this colorful and chaotic 4-on-4 action shooter. For the first time, take Turf War battles on-the-go with the Nintendo Switch™ system, and use any of the consoles portable play styles for intense local multiplayer* action. Even team up for new 4-player co-op fun in Salmon Run!'
        ,'45.98','3.99'
        ),
        ('Splatoon 2', '37.99', 'STANDARD', 'PRE-OWNED','5.69',
        'Ink-splatting action is back and fresher than ever The squid kids called Inklings are back to splat more ink and claim more turf in this colorful and chaotic 4-on-4 action shooter. For the first time, take Turf War battles on-the-go with the Nintendo Switch™ system, and use any of the consoles portable play styles for intense local multiplayer* action. Even team up for new 4-player co-op fun in Salmon Run!'
        ,'43.68','3.79'
        ),
        ('Splatoon 2', '39.99', 'STANDARD', 'DIGITAL','5.99',
        'Ink-splatting action is back and fresher than ever The squid kids called Inklings are back to splat more ink and claim more turf in this colorful and chaotic 4-on-4 action shooter. For the first time, take Turf War battles on-the-go with the Nintendo Switch™ system, and use any of the consoles portable play styles for intense local multiplayer* action. Even team up for new 4-player co-op fun in Salmon Run!'
        ,'45.98','3.99'
        );

INSERT  INTO    STORE
VALUE
        ('2','11','500'),
        ('5','2','500'),
        ('3','7','230'),
        ('3','10','700'),
        ('3','1','100'),
        ('1','2','301'),
        ('1','3','188'),
        ('2','20','200'),
        ('4','3','102'),
        ('5','5','500'),
        ('2','19','50'),
        ('5','6','200'),
        ('2','4','50'),
        ('4','8','200'),
        ('4','9','300'),
        ('4','12','500'),
        ('5','13','219'),
        ('5','14','438'),
        ('2','15','500'),
        ('3','16','398'),
        ('3','17','40'),
        ('4','18','500');

INSERT  INTO    PAYMENT(UID,CARDNUM,EXPMON,EXPYEAR,CVN,CFNAME,CLNAME)
VALUE
        ('2','9811658346852267','09','2022','293','Isabella','Williams'),
        ('1','0810293874897120','12','2027','093','Ava','Johnson'),
        ('3','0983248972128231','01','2024','190','Michael','Taylor'),
        ('5','7918273003801237','07','2023','077','Stacy','Anderson'),
        ('4','7891237943095873','10','2026','592','Jayden','Brown');

INSERT  INTO    BILLINGINFO(UID,ADDRESS,OPTLINE,CITY,STATE,ZIPCODE,COUNTRY,CONTACT)
VALUE
        ('2','1231W LINCOLN HWY','APT01','DeKalb','IL','60115','USA','6505130514'),
        ('1','545 1st Ave','Floor 1','New York','NY','10016','USA','8302123892'),
        ('3','25 W Kaley St','','Orlando','FL','32806','USA','7791209239'),
        ('5','809 Griffith Ave','','Las Vegas', 'NV', '89104', 'USA','1209382307'),
        ('4','621 S Plymouth Ct','', 'Chicago', 'IL', '60605', 'USA', '7792703338');

INSERT  INTO    CART
VALUE
        ('2','12','1'),
        ('2','3','2'),
        ('4','7','1'),
        ('5','9','4'),
        ('4','1','1'),
        ('1','5','1'),
        ('3','12','2'),
        ('1','20','1'),
        ('4','17','1'),
        ('3','5','1'),
        ('2','8','1'),
        ('1','11','1'),
        ('1','1','1'),
        ('5','19','7'),
        ('3','19','1');

INSERT  INTO    ORDERSTATUS(UID,IID,EMPID,STATUS,NOTE)
VALUE
        ('2','12','4','Finish',''),
        ('1','5','5','Pending','Please call me when arrive.'),
        ('5','2','1','Finish',''),
        ('1','2','5','Shipping',''),
        ('3','12','4','Pending',''),
        ('4','17','3','Finish','Please call me when arrive.'),
        ('4','1','3','Shipping','');
