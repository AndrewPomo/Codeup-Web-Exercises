<?php 

require_once 'park_credentials.php';
require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$dbc->exec('TRUNCATE national_parks;');

$parks = [
    [
    	'name' => 'Acadia', 
    	'img' => 'np1.jpg',
    	'location' => 'Maine',
    	'date_established' => '1919-02-26',
    	'area_in_acres' => 47389.67,
    	'description' => "Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats."
    ],
    [
    	'name' => 'American Samoa',
    	'img' => 'np2.jpg',
    	'location' => 'American Samoa',
    	'date_established' => '1988-10-31',
    	'area_in_acres' => '9000.00',
    	'description' => "The southernmost national park is on three Samoan islands and protects coral reefs, rainforests, volcanic mountains, and white beaches. The area is also home to flying foxes, brown boobies, sea turtles, and 900 species of fish."
    ],
    [
    	'name' => 'Arches',
    	'img' => 'np3.jpg',
    	'location' => 'Utah',
    	'date_established' => '1929-04-12',
    	'area_in_acres' => '76518.98',
    	'description' => "This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers."
    ],
    [
    	'name' => 'Badlands',
    	'img' => 'np4.jpg',
    	'location' => 'South Dakota',
    	'date_established' => '1978-11-10',
    	'area_in_acres' => '242755.94',
    	'description' => "The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the world's richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes."
    ],
    [
    	'name' => 'Big Bend',
    	'img' => 'np5.jpg',
    	'location' => 'Texas',
    	'date_established' => '1944-06-12',
    	'area_in_acres' => '801163.21',
    	'description' => "Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders."
    ],
    [
    	'name' => 'Biscayne',
    	'img' => 'np6.jpg',
    	'location' => 'Florida',
    	'date_established' => '1980-06,28',
    	'area_in_acres' => '172924.07',
    	'description' => "Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs. Threatened animals include the West Indian manatee, American crocodile, various sea turtles, and peregrine falcon."
    ],
    [
    	'name' => 'Black Canyon of the Gunnison',
    	'img' => 'np7.jpg',
    	'location' => 'Colorado',
    	'date_established' => '1999-10-21',
    	'area_in_acres' => '32950.03',
    	'description' => "The park protects a quarter of the Gunnison River, which slices sheer canyon walls from dark Precambrian-era rock. The canyon features incredibly steep descents, and is a popular site for river rafting and rock climbing. The deep, narrow canyon, made of gneiss and schist, is often in shadow and therefore appears black."
    ],
    [
    	'name' => 'Bryce Canyon',
    	'img' => 'np8.jpg',
    	'location' => 'Utah',
    	'date_established' => '1928-02-25',
    	'area_in_acres' => '35835.08',
    	'description' => "Bryce Canyon is a giant geological amphitheater on the Paunsaugunt Plateau. The unique area has hundreds of tall sandstone hoodoos formed by erosion. The region was originally settled by Native Americans and later by Mormon pioneers."
    ],
    [
    	'name' => 'Canyonlands',
    	'img' => 'np9.jpg',
    	'location' => 'Utah',
    	'date_established' => '1964-09-12',
    	'area_in_acres' => '337597.83',
    	'description' => "This landscape was eroded into a maze of canyons, buttes, and mesas by the combined efforts of the Colorado River, Green River, and their tributaries, which divide the park into three districts. There are rock pinnacles and other naturally sculpted rock formations, as well as artifacts from Ancient Pueblo peoples."
    ],
    [
    	'name' => 'Capitol Reef',
    	'img' => 'np10.jpg',
    	'location' => 'Utah',
    	'date_established' => '1971-12-18',
    	'area_in_acres' => '241904.26',
    	'description' => "The park's Waterpocket Fold is a 100-mile (160 km) monocline that exhibits the earth's diverse geologic layers. Other natural features are monoliths, sandstone domes, and cliffs shaped like the United States Capitol."
    ],
    [
    	'name' => 'Carlsbad Caverns',
    	'img' => 'np11.jpg',
    	'location' => 'New Mexico',
    	'date_established' => '1930-05-14',
    	'area_in_acres' => '46766.45',
    	'description' => "Carlsbad Caverns has 117 caves, the longest of which is over 120 miles (190 km) long. The Big Room is almost 4,000 feet (1,200 m) long, and the caves are home to over 400,000 Mexican free-tailed bats and sixteen other species. Above ground are the Chihuahuan Desert and Rattlesnake Springs."
    ],
    [
    	'name' => 'Channel Islands',
    	'img' => 'np12.jpg',
    	'location' => 'California',
    	'date_established' => '1980-03-05',
    	'area_in_acres' => '249561.00',
    	'description' => "Five of the eight Channel Islands are protected, and half of the park's area is underwater. The islands have a unique Mediterranean ecosystem originally settled by the Chumash people. They are home to over 2,000 species of land plants and animals, and 145 are unique to them, including the island fox. Professional ferry services offer transportation to the islands from the mainland."
    ],
    [
    	'name' => 'Congaree',
    	'img' => 'np13.jpg',
    	'location' => 'South Carolina',
    	'date_established' => '2003-10-10',
    	'area_in_acres' => '26545.86',
    	'description' => "On the Congaree River, this park is the largest portion of old-growth floodplain forest left in North America. Some of the trees are the tallest in the Eastern US. An elevated walkway called the Boardwalk Loop guides visitors through the swamp."
    ],
    [
    	'name' => 'Crater Lake',
    	'img' => 'np14.jpg',
    	'location' => 'Oregon',
    	'date_established' => '1902-05-22',
    	'area_in_acres' => 183224.05,
    	'description' => "Crater Lake lies in the caldera of an ancient volcano called Mount Mazama that collapsed 7,700 years ago. It is the deepest lake in the United States and is famous for its vivid blue color and water clarity. There are two more recent volcanic islands in the lake, and, with no inlets or outlets, all water comes through precipitation."
    ],
    [
    	'name' => 'Cuyahoga Valley',
    	'img' => 'np15.jpg',
    	'location' => 'Ohio',
    	'date_established' => '2000-10-11',
    	'area_in_acres' => '32950',
    	'description' => "This park along the Cuyahoga River has waterfalls, hills, trails, and exhibits on early rural living. The Ohio and Erie Canal Towpath Trail follows the Ohio and Erie Canal, where mules towed canal boats. The park has numerous historic homes, bridges, and structures,[21] and also offers a scenic train ride."
    ],
    [
    	'name' => 'Death Valley',
    	'img' => 'np16.jpg',
    	'location' => 'California, Nevada',
    	'date_established' => '1994-10-31',
    	'area_in_acres' => '3372401.96',
    	'description' => "Death Valley is the hottest, lowest, and driest place in the United States. Daytime temperatures have topped 130 °F (54 °C) and it is home to Badwater Basin, the lowest elevation in North America. A diversity of colorful canyons, desolate badlands, shifting sand dunes, sprawling mountains, and over 1000 species of plants populate this geologic graben. Additional points of interest include salt flats, historic mines, and springs."
    ],
    [
        'name' => 'Denali',
        'img' => 'np17.jpg',
        'location' => 'Alaska',
        'date_established' => '1917-02-26',  
        'area_in_acres' => '4740911',
        'description' => 'Centered around Denali, the tallest mountain in North America, Denali is serviced by a single road leading to Wonder Lake. Denali and other peaks of the Alaska Range are covered with long glaciers and boreal forest. Wildlife includes grizzly bears, Dall sheep, caribou, and gray wolves.'
    ],
    [
        'name' => 'Dry Tortugas',
        'img' => 'np18.jpg',
        'location' => 'Florida',
        'date_established' => '1992-10-26',  
        'area_in_acres' => '64701.22',
        'description' => 'The islands of the Dry Tortugas, at the westernmost end of the Florida Keys, are the site ofFort Jefferson, a Civil War-era fort that is the largest masonrystructure in the Western Hemisphere. With most of the park being remote ocean, it is home to undisturbed coral reefs and shipwrecks and is only accessible by plane or boat.'
    ],
    [
        'name' => 'Everglades',
        'img' => 'np19.jpg',
        'location' => 'Florida',
        'date_established' => '1934-05-30',  
        'area_in_acres' => '1508537',
        'description' => 'The Everglades are the largest subtropical wilderness in the United States. This mangrovee cosystem and marine estuary is home to 36 protected species, including theFlorida panther,American crocodile, andWest Indian manatee. Some areas have been drained and developed; restoration projects aim to restore the ecology.'
    ],
    [
        'name' => 'Gates of the Arctic',
        'img' => 'np21.jpg',
        'location' => 'Alaska',
        'date_established' => '1980-12-02',   
        'area_in_acres' => '7523897',
        'description' => 'The country\'s northernmost park protects an expanse of pure wilderness in Alaska\'sBrooks Rangeand has no park facilities. The land is home to Alaska natives, who have relied on the land andcaribou for 11,000 years.'
    ],
    [
        'name' => 'Glacier',
        'img' => 'np21.jpg',
        'location' => 'Montana',
        'date_established' => '2010-05-11',  
        'area_in_acres' => '1013572',
        'description' => 'The U.S. half ofWaterton-Glacier International Peace Park, this park hosts 26 glaciers and 130 named lakes beneath a stunning canopy of Rocky Mountain peaks. There are historic hotels and a landmark road in this region of rapidly receding glaciers. The local mountains, formed by anoverthrust, expose the world\'s best-preserved sedimentary fossils from theProterozoicera.'
    ],
    [
        'name' => 'Glacier Bay',
        'img' => 'np22.jpg',
        'location' => 'Alaska',
        'date_established' =>  '00-01-01', 
        'area_in_acres' => '3224840.31',
        'description' => 'Glacier Bay has fjords, and a temperate rainforest, and is home to large populations of grizzly bears, mountain goats, whales, seals, and eagles. When discovered in 1794 byGeorge Vancouver, the entire bay was covered in ice, but the glaciers have since receded more than 65 miles (105 km).'
    ],
    [
        'name' => 'Grand Canyon',
        'img' => 'np23.jpg',
        'location' => 'Arizona',
        'date_established' => '1919-02-26',  
        'area_in_acres' => '1217403',
        'description' => 'The Grand Canyon, carved by the mightyColorado River, is 277 miles (446 km) long, up to 1 mile (1.6 km) deep, and up to 15 miles (24 km) wide. Millions of years of erosion have exposed the colorful layers of theColorado Plateau in countless mesas and canyon walls, visible from both the north and south rims, or from a number of trails that descend into the canyon itself.'
    ],
    [
        'name' => 'Grand Teton',
        'img' => 'np24.jpg',
        'location' => 'Wyoming',
        'date_established' => '1929-02-26',  
        'area_in_acres' => '309994.66',
        'description' => 'Grand Teton is the tallest mountain in theTeton Range. The park\'s historic Jackson Hole and reflective piedmont lakes teem with unique wildlife and contrast with the dramatic mountains, which rise abruptly from the sage-covered valley below.'
    ],
    [
        'name' => 'Great Basin',
        'img' => 'np25.jpg',
        'location' => 'Nevada',
        'date_established' => '1986-10-27',  
        'area_in_acres' => '77180.00',
        'description' => 'Based around Nevada\'s second tallest mountain,Wheeler Peak,Great BasinNational Park contains 5,000-year-oldbristlecone pines, a rock glacier, and the limestoneLehman Caves. It also enjoys some of the country\'s darkest night skies. Animals which call the park home includeTownsend\'s big-eared bat,pronghorn, andBonneville cutthroat trout.'
    ],
    [
        'name' => 'Great Sand Dunes',
        'img' => 'np26.jpg',
        'location' => 'Colorado',
        'date_established' => '1904-09-13',  
        'area_in_acres' => '42983.74',
        'description' => 'The tallest sand dunes in North America, up to 750 feet (230 m) tall, were formed by deposits of the ancient Rio Grande in theSan Luis Valley. Abutting a variety of grasslands, shrublands, and wetlands, the park also has alpine lakes, six 13,000-foot mountains, and old-growth forests.'
    ],
    [
        'name' => 'Great Smoky Mountains',
        'img' => 'np27.jpg',
        'location' => 'North Carolina, Tennessee',
        'date_established' => '1934-06-15',  
        'area_in_acres' => '521490.13',
        'description' => 'The Great Smoky Mountains, part of theAppalachian Mountains, span a wide range of elevations, making them home to over 400 vertebrate species, 100 tree species, and 5000 plant species. Hiking is the park\'s main attraction, with over 800 miles (1,300 km) of trails, including 70 miles (110 km) of theAppalachian Trail. Other activities include fishing, horseback riding, and touring nearly 80 historic structures.'
    ],
    [
        'name' => 'Guadalupe Mountains',
        'img' => 'np28.jpg',
        'location' => 'Texas',
        'date_established' => '1966-10-15',  
        'area_in_acres' => '86415.97',
        'description' => 'This park boastsGuadalupe Peak, the highest point in Texas; the scenicMcKittrick Canyon filled with bigtooth maples; a corner of the aridChihuahuan Desert; and a fossilized coral reef from thePermian era.'
    ],
    [
        'name' => 'Haleakalā',
        'img' => 'np29.jpg',
        'location' => 'Hawaii',
        'date_established' => '1916-08-01',   
        'area_in_acres' => '29093.67',
        'description' => 'The Haleakalāvolcano onMaui features a very large crater with numerouscinder cones,Hosmer\'s Grove of alien trees, theKipahulusection\'s scenic pools of freshwater fish, and the nativeHawaiian goose. It is home to the greatest number of endangered species within a U.S. National Park.'
    ],
    [
        'name' => 'Hawaii Volcanoes',
        'img' => 'np30.jpg',
        'location' => 'Hawaii',
        'date_established' => '1916-08-01',   
        'area_in_acres' => '323431.38',
        'description' => 'This park on the Big Islandprotects the famous Kīlaueaand Mauna Loavolcanoes, two of the world\'s most active geological features. Diverse ecosystems range from tropical forests at sea level to barren lava beds at more than 13,000 feet (4,000 m).'
    ],
    [
        'name' => 'Hot Springs',
        'img' => 'np31.jpg',
        'location' => 'Arkansas',
        'date_established' => '1921-03-04',   
        'area_in_acres' => '5549.75',
        'description' => 'Hot Springs was established by act of Congress as a federal reserve on April 20, 1832, as such it is the oldest park managed by the National Park Service. Congress changed the reserve\'s designation to National Park on March 4, 1921 after the National Park Service was established in 1916. Hot Springs is the smallest and only National Park in an urban area and is based around natural hot springs that flow out of the low lyingOuachita Mountains. The springs provide opportunities for relaxation in an historic setting;Bathhouse Rowpreserves numerous examples of 19th-century architecture.'
    ],
    [
        'name' => 'Isle Royale',
        'img' => 'np32.jpg',
        'location' => 'Michigan',
        'date_established' => '1940-04-03',   
        'area_in_acres' => '571790.11',
        'description' => 'The largest island in Lake Superior is a place of isolation and wilderness. Along with its many shipwrecks, waterways, and hiking trails, the park also includes over 400 smaller islands within 4.5 miles (7.2 km) of its shores. There are only 20 mammal species on the entire island, though the relationship between its wolf and moose populations is especially unique.'
    ],
    [
        'name' => 'Joshua Tree',
        'img' => 'np33.jpg',
        'location' => 'California',
        'date_established' => '1994-10-31',  
        'area_in_acres' => '789745.47',
        'description' => 'Covering large areas of theColorado andMojave Desertsand the Little San Bernardino Mountains, this exotic desert landscape is populated by vast stands of the famousJoshua tree. Great changes in elevation reveal starkly contrasting environments including bleached sand dunes, dry lakes, rugged mountains, and maze-like clusters ofmonzogranitemonoliths.'
    ],
    [
        'name' => 'Katmai',
        'img' => 'np34.jpg',
        'location' => 'Alaska',
        'date_established' => '1980-12-02',   
        'area_in_acres' => '3674529',
        'description' => 'This park on the Alaska Peninsulaprotects theValley of Ten Thousand Smokes, an ash flow formed by the 1912 eruption ofNovarupta, as well as Mount Katmai. Over 2,000 grizzly bears come here each year to catch spawningsalmon. Other wildlife includescaribou,wolves, moose, andwolverines.'
    ],
    [
        'name' => 'Kenai Fjords',
        'img' => 'np35.jpg',
        'location' => 'Alaska',
        'date_established' => '1980-12-02',   
        'area_in_acres' => '669982.99',
        'description' => 'Near Sewardon the Kenai Peninsula, this park protects the Harding Icefield and at least 38 glaciers andfjords stemming from it. The only area accessible to the public by road is Exit Glacier; the rest must be viewed from boat tours.'
    ],
    [
        'name' => 'Kings Canyon',
        'img' => 'np36.jpg',
        'location' => 'California',
        'date_established' => '1940-03-04',   
        'area_in_acres' => '461901.20',
        'description' => 'Home to several giant sequoia groves and the General Grant Tree, the world\'s second largest, this park also features part of the Kings River, sculptor of the dramatic granite canyon that is its namesake, and the San Joaquin River, as well as Boyden Cave.'
    ],
    [
        'name' => 'Kobuk Valley',
        'img' => 'np37.jpg',
        'location' => 'Alaska',
        'date_established' => '1980-12-02',   
        'area_in_acres' => '1750716',
        'description' => 'Kobuk Valley protects 61 miles (98 km) of the Kobuk Riverand three regions of sand dunes. Created by glaciers, the Great Kobuk, Little Kobuk, and Hunt River Sand Dunes can reach 100 feet (30 m) high and 100 °F (38 °C), and they are the largest dunes in the Arctic. Twice a year, half a million caribou migrate through the dunes and across river bluffs that expose well-preserved ice age fossils.'
    ],
    [
        'name' => 'Lake Clark',
        'img' => 'np38.jpg',
        'location' => 'Alaska',
        'date_established' => '1980-12-02',   
        'area_in_acres' => '2619733',
        'description' => 'The region around Lake Clark features four active volcanoes, including Mount Redoubt, as well as an abundance of rivers, glaciers, and waterfalls. Temperate rainforests, a tundra plateau, and three mountain ranges fill in the remaining landscape.'
    ],
    [
        'name' => 'Lassen Volcanic',
        'img' => 'np39.jpg',
        'location' => 'California',
        'date_established' => '1916-08-09',   
        'area_in_acres' => '106372.36',
        'description' => 'Lassen Peak, the largest plug dome volcano in the world, is joined by all three other types of volcanoes in this park: shield, cinder dome, and composite. Though Lassen itself last erupted in 1915, most of the rest of the park is continuously active: numerous hydrothermal features, includingfumaroles, boiling pools, and bubbling mud pots, are heated by molten rock from beneath the peak.'
    ],
    [
        'name' => 'Mammoth Cave',
        'img' => 'np40.jpg',
        'location' => 'Kentucky',
        'date_established' => '1941-07-01',   
        'area_in_acres' => '52830.19',
        'description' => 'With more than 400 miles (640 km) of passageways explored, Mammoth Cave is by far the world\'s longest cave system. Subterranean wildlife includes eight bat species,Kentucky cave shrimp,Northern cavefish, and cave salamanders. Above ground, the park provides recreation on the Green River, 70 miles of hiking trails, and plenty of sinkholes and springs.'
    ],
    [
        'name' => 'Mesa Verde',
        'img' => 'np41.jpg',
        'location' => 'Colorado',
        'date_established' => '1906-06-29',  
        'area_in_acres' => '52121.93',
        'description' => 'This area constitutes over 4,000 archaeological sites of theAncestral Puebloanpeople, who lived here and elsewhere in the Four Corners region for at least 700 years. Cliff dwellings built in the 12th and 13th centuries include the famous Cliff Palace, which has 150 rooms and 23 kivas, and the Balcony House, with its many passages and tunnels.'
    ],
    [
        'name' => 'Mount Rainier',
        'img' => 'np42.jpg',
        'location' => 'Washington',
        'date_established' => '1899-03-02',  
        'area_in_acres' => '235625.00',
        'description' => 'Mount Rainier, an active stratovolcano, is the mostprominent peak in theCascades, and is covered by 26 named glaciers includingCarbon Glacierand Emmons Glacier, the largest in the continental United States. The mountain is popular for climbing, and more than half of the park is covered bysubalpine and alpine forests.Paradise on the south slope is one of the snowiest places in the world, and theLongmire visitor center is the start of theWonderland Trail, which encircles the mountain.'
    ],
    [
        'name' => 'North Cascades',
        'img' => 'np43.jpg',
        'location' => 'Washington',
        'date_established' => '1968-10-02',   
        'area_in_acres' => '504780.94',
        'description' => 'This complex encompasses two units of the national park itself as well as the Ross Lakeand Lake Chelan National Recreation Areas. The highly glaciated mountains are spectacular examples ofCascadegeology; popular hiking and climbing areas includeCascade Pass,Mount Shuksan,Mount Triumph, and Eldorado Peak.'
    ],
    [
        'name' => 'Olympic',
        'img' => 'np44.jpg',
        'location' => 'Washington',
        'date_established' => '1938-06-29',  
        'area_in_acres' => '922650.86',
        'description' => 'Situated on theOlympic Peninsula, this park straddles a diversity of ecosystems from Pacific shoreline to temperate rainforests to the alpine slopes of Mount Olympus. The scenic Olympic Mountainsoverlook theHoh Rain Forest andQuinault Rain Forest, the wettest area in the continental United States.'
    ],
    [
        'name' => 'Petrified Forest',
        'img' => 'np45.jpg',
        'location' => 'Arizona',
        'date_established' => '1962-12-09',   
        'area_in_acres' => '93532.57',
        'description' => 'This portion of the Chinle Formation has a great concentration of 225-million-year-oldpetrified wood. The surroundingPainted Desertfeatures eroded cliffs of wonderfully red-hued volcanic rock calledbentonite. There are also dinosaur fossils and over 350 Native American sites.'
    ],
    [
        'name' => 'Pinnacles',
        'img' => 'np46.jpg',
        'location' => 'California',
        'date_established' => '1913-01-10',  
        'area_in_acres' => '26605.73',
        'description' => 'Named for the eroded leftovers of a portion of an extinct volcano, the park is famous for its massive black and gold monoliths ofandesite andrhyolite, which are popular withrock climbers, and a hiker\'s paradise of quiet trails crossing scenicCoast Rangewilderness. The park is home to the endangeredCalifornia condor(Gymnogyps californianus) and one of the few locations in the world where these extremely rare birds can be seen in the wild. Pinnacles also supports a dense population ofprairie falcons, and more than 13 species of bat which populate its talus caves.'
    ],
    [
        'name' => 'Redwood',
        'img' => 'np47.jpg',
        'location' => 'California',
        'date_established' => '1968-10-02',   
        'area_in_acres' => '112512.05',
        'description' => 'This park and the co-managed state parks protect almost half of all remainingcoastal redwoods, the tallest trees on earth. There are three large river systems in this very seismically active area, and 37 miles (60 km) of protected coastline reveal tide pools andseastacks. The prairie, estuary, coast, river, and forest ecosystems contain a huge variety of animal and plant species.'
    ],
    [
        'name' => 'Rocky Mountain',
        'img' => 'np48.jpg',
        'location' => 'Colorado',
        'date_established' => '1915-01-26',  
        'area_in_acres' => '265828.41',
        'description' => 'Bisected north to south by theContinental Divide, this portion of theRockies has ecosystems varying from over 150riparian lakes to montane and subalpine forests to treeless alpine tundra. Wildlife including mule deer, bighorn sheep, black bears, and cougars inhabit its igneous mountains and glacier valleys.Longs Peak, a classic Coloradofourteener, and the scenic Bear Lake are popular destinations, as well as the famous Trail Ridge Road, which reaches an elevation of more than 12,000 feet (3,700 m).'
    ],
    [
        'name' => 'Saguaro',
        'img' => 'np49.jpg',
        'location' => 'Arizona',
        'date_established' => '1994-10-14',  
        'area_in_acres' => '91439.71',
        'description' => 'Split into the separateRincon Mountain andTucson Mountaindistricts, this park is evidence that the dry Sonoran Desert is still home to a great variety of life spanning six biotic communities. Beyond the namesake giant saguaro cacti, there are barrel cacti, chollas, and prickly pears, as well as lesser long-nosed bats,spotted owls, andjavelinas.'
    ],
    [
        'name' => 'Sequoia',
        'img' => 'np50.jpg',
        'location' => 'California',
        'date_established' => '1890-09-25', 
        'area_in_acres' => '404051.17',
        'description' => 'This park protects theGiant Forest, which boasts some of the world\'s largest trees, theGeneral Sherman being the largest in the park. It also has over 240 caves, a scenic segment of theSierra Nevadaincluding thetallest mountain in the contiguous United States, and Moro Rock, a photogenic granite dome.'
    ],
    [
        'name' => 'Shenandoah',
        'img' => 'np51.jpg',
        'location' => 'Virginia',
        'date_established' => '1926-05-22',  
        'area_in_acres' => '199045.23',
        'description' => 'Shenandoah\'s Blue Ridge Mountains are covered by sprawling hardwood forests that teem with tens of thousands of animals. TheSkyline DriveandAppalachian Trail run the entire length of this narrow park, along with more than 500 miles (800 km) of hiking trails passing scenic overlooks and cataracts of theShenandoah River.'
    ],
    [
        'name' => 'Theodore Roosevelt',
        'img' => 'np52.jpg',
        'location' => 'North Dakota',
        'date_established' => '1978-11-10',  
        'area_in_acres' => '70446.89',
        'description' => 'This region that enticed and influenced PresidentTheodore Rooseveltconsists of a park of three units in the northern badlands. Besides Roosevelt\'s historic cabin, there are numerous scenic drives and backcountry hiking opportunities. Wildlife includesAmerican bison,pronghorn,bighorn sheep, and wildhorses.'
    ],
    [
        'name' => 'Virgin Islands',
        'img' => 'np53.jpg',
        'location' => 'US Virgin Islands',
        'date_established' => '1956-08-02',   
        'area_in_acres' => '14688.87',
        'description' => 'The island ofSaint John has rich human and natural histories. Taínoarchaeological sites and ruins of sugar plantations fromColumbus\' time litter the coast. Past the pristine beaches are mangrove forests, seagrass beds, coral reefs, and vast algal plains.'
    ],
    [
        'name' => 'Voyageurs',
        'img' => 'np54.jpg',
        'location' => 'Minnesota',
        'date_established' => '1971-01-08',   
        'area_in_acres' => '218200.17',
        'description' => 'This park protecting four lakes near the Canadian border is a site for canoeing, kayaking, and fishing, and preserves a history populated byOjibwe Native Americans, French fur traders calledvoyageurs, and ambitious gold-miners. Formed by glaciers, the region features tall bluffs, rock gardens, scenic islands and bays, and several historic buildings.'
    ],
    [
        'name' => 'Wind Cave',
        'img' => 'np55.jpg',
        'location' => 'South Dakota',
        'date_established' => '1903-01-09',   
        'area_in_acres' => '28295.03',
        'description' => 'Wind Cave is distinctive for its calcite fin formations called boxworkand needle-like growths calledfrostwork. The cave, which was discovered by a sound like that of wind coming from a hole in the ground, is the world\'s densest cave system. Above ground is a mixed-grass prairie with animals such as bison,black-footed ferrets, andprairie dogs.[62]and ponderosa pine forests home tocougars andelk.'
    ],
    [
        'name' => 'Wrangell–​St. Elias',
        'img' => 'np56.jpg',
        'location' => 'Alaska',
        'date_established' => '1980-12-02',   
        'area_in_acres' => '8323147',
        'description' => 'An immense plot of mountainous country protects the convergence of the Alaska, Chugach, and Wrangell-Saint Elias Ranges, which include many of the continent\'s tallest mountains and volcanoes, including the 18,008-footMount Saint Elias. More than a quarter of the park is covered with glaciers, including the tidewaterHubbard Glacier, piedmontMalaspina Glacier, and valley Nabesna Glacier.'
    ],
    [
        'name' => 'Yellowstone',
        'img' => 'np57.jpg',
        'location' => 'Wyoming, Montana, Idaho',
        'date_established' => '1872-03-01',
        'area_in_acres' => '2219790',
        'description' => 'Situated on theYellowstone Caldera, the park has an expansive network ofgeothermal areas including vividly colored hot springs, boiling mud pots, and regularly erupting geysers, the best-known being Old Faithful andGrand Prismatic Spring. The yellow-huedGrand Canyonof theYellowstone River has a number of scenicwaterfalls, and four mountain ranges run through the park. More than 60 mammal species including gray wolves, grizzly bears, lynxes,bison, and elk, make this park one of the best wildlife viewing spots in the country.'
    ],
    [
        'name' => 'Yosemite',
        'img' => 'np58.jpg',
        'location' => 'California',
        'date_established' => '1890-10-1',
        'area_in_acres' => '761266.19',
        'description' => 'Among the earliest candidates for National Park status, Yosemite features towering granite cliffs, dramatic waterfalls, and old-growth forests at a unique intersection of geology and hydrology. Half Dome and El Capitan rise from the park\'s centerpiece, the glacier-carvedYosemite Valley, and from its vertical walls dropYosemite Falls, North America\'s tallest waterfall. Three giant sequoia groves, along with a pristine wilderness in the heart of theSierra Nevada, are home to an abundance of rare plant and animal species.'
    ],
    [
        'name' => 'Zion',
        'img' => 'np59.jpg',
        'location' => 'Utah',
        'date_established' => '1919-11-19',    
        'area_in_acres' => '146597.60',
        'description' => 'Located at the junction of theColorado Plateau, Great Basin, andMojave Desert, this geological wonder has colorful sandstone canyons, mountainous mesas, and countless rock towers. Natural arches and exposed plateau formations compose a large wilderness roughly divided into four ecosystems:desert, riparian,woodland, andconiferous forest.'
    ]
];

$stmt = $dbc->prepare('INSERT INTO national_parks (name, img, location, date_established, area_in_acres, description) VALUES (:name, :img, :location, :date_established, :area_in_acres, :description)');

foreach ($parks as $park) {
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':img', $park['img'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $park['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_STR); 
    $stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);
    
    $stmt->execute();

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}

 ?>