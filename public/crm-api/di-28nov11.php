<?php
$pdo1 = new mysqli("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchis_franchisnewcopy");
if ($pdo1->connect_error) {
    die("Connection failed: " . $pdo1->connect_error);
}
//echo "Connected successfully \n";
$pdo2 = new mysqli("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchise_dealer_db");
if ($pdo2->connect_error) {
    die("Connection failed: " . $pdo2->connect_error);
}
echo "Connected successfully2 \n";


$pdo2->query("SET sql_mode = ''");

function _getstate($id) {
    $states = [
        ["id" => 1, "name" => "Andaman & Nicobar Islands"],
        ["id" => 2, "name" => "Andhra Pradesh"],
        ["id" => 3, "name" => "Arunachal Pradesh"],
        ["id" => 4, "name" => "Assam"],
        ["id" => 5, "name" => "Bihar"],
        ["id" => 6, "name" => "Chhattisgarh"],
        ["id" => 7, "name" => "Dadra & Nagar Haveli"],
        ["id" => 8, "name" => "Daman & Diu"],
        ["id" => 9, "name" => "Delhi"],
        ["id" => 10, "name" => "Goa"],
        ["id" => 11, "name" => "Gujarat"],
        ["id" => 12, "name" => "Haryana"],
        ["id" => 13, "name" => "Himachal Pradesh"],
        ["id" => 14, "name" => "Jammu & Kashmir"],
        ["id" => 15, "name" => "Jharkhand"],
        ["id" => 16, "name" => "Karnataka"],
        ["id" => 17, "name" => "Kerala"],
        ["id" => 18, "name" => "Lakshadweep"],
        ["id" => 19, "name" => "Madhya Pradesh"],
        ["id" => 20, "name" => "Maharashtra"],
        ["id" => 21, "name" => "Manipur"],
        ["id" => 22, "name" => "Meghalaya"],
        ["id" => 23, "name" => "Mizoram"],
        ["id" => 24, "name" => "Nagaland"],
        ["id" => 25, "name" => "Odisha"],
        ["id" => 26, "name" => "Puducherry"],
        ["id" => 27, "name" => "Punjab"],
        ["id" => 28, "name" => "Rajasthan"],
        ["id" => 29, "name" => "Sikkim"],
        ["id" => 30, "name" => "Tamil Nadu"],
        ["id" => 31, "name" => "Tripura"],
        ["id" => 32, "name" => "Uttar Pradesh"],
        ["id" => 33, "name" => "Uttarakhand"],
        ["id" => 34, "name" => "West Bengal"],
        ["id" => 35, "name" => "Chandigarh"],
        ["id" => 36, "name" => "Telangana"],
        ["id" => 37, "name" => "Ladakh"]
    ];
    foreach ($states as $state) {
        if ($state['id'] == $id) {
            return $state['name']; // Return the name of the state
        }
    }   
}

function _getIndCat($di) {
    $categories = [
            ////
            ["di" =>12, "fi" =>"787"],
            ["di" =>11, "fi" =>"443"],
            ["di" =>13, "fi" =>"477"],
            ["di" =>26, "fi" =>"1001"],
            ["di" =>17, "fi" =>"1002"],
            ["di" =>8, "fi" =>"770"],
            ["di" =>15, "fi" =>"950"],
            ["di" =>7, "fi" =>"909"],
            ["di" =>29, "fi" =>"896"],
            ["di" =>14, "fi" =>"445"],
            ["di" =>1, "fi" =>"868"],
            ["di" =>18, "fi" =>"1003"],
            ["di" =>2, "fi" =>"846"],
            ["di" =>19, "fi" =>"479"],
            ["di" =>20, "fi" =>"1004"],
            ["di" =>27, "fi" =>"738"],
            ["di" =>25, "fi" =>"1005"],
            ["di" =>16, "fi" =>"780"],
            ["di" =>6, "fi" =>"478"],
            ["di" =>21, "fi" =>"1006"],
            ["di" =>3, "fi" =>"1007"],
            ["di" =>22, "fi" =>"1008"],
            ["di" =>30, "fi" =>"1009"],
            ["di" =>23, "fi" =>"1010"],
            ["di" =>9, "fi" =>"860"],
            ["di" =>4, "fi" =>"761"],
            ["di" =>10, "fi" =>"1011"],
            ["di" =>24, "fi" =>"1012"],
            ["di" =>5, "fi" =>"1013"],

    ];
    foreach ($categories as $cate) {
        if ($cate['di'] == $di) {
            return $cate['fi']; // Return the name of the state
        }
    }   
}


function _getIndSubCat($di) {
    $subcategories = [
        ["di" =>178, "fi" =>"967"],
        ["di" =>493, "fi" =>"741"],
        ["di" =>362, "fi" =>"1067"],
        ["di" =>106, "fi" =>"1219"],
        ["di" =>262, "fi" =>"944"],
        ["di" =>246, "fi" =>"790"],
        ["di" =>562, "fi" =>"901"],
        ["di" =>494, "fi" =>"743"],
        ["di" =>563, "fi" =>"899"],
        ["di" =>564, "fi" =>"906"],
        ["di" =>119, "fi" =>"1239"],
        ["di" =>337, "fi" =>"1096"],
        ["di" =>65, "fi" =>"856"],
        ["di" =>207, "fi" =>"866"],
        ["di" =>467, "fi" =>"1232"],
        ["di" =>405, "fi" =>"1129"],
        ["di" =>488, "fi" =>"1047"],
        ["di" =>468, "fi" =>"1156"],
        ["di" =>311, "fi" =>"809"],
        ["di" =>223, "fi" =>"450"],
        ["di" =>239, "fi" =>"451"],
        ["di" =>156, "fi" =>"451"],
        ["di" =>224, "fi" =>"735"],
        ["di" =>225, "fi" =>"455"],
        ["di" =>226, "fi" =>"451"],
        ["di" =>227, "fi" =>"446"],
        ["di" =>101, "fi" =>"1220"],
        ["di" =>70, "fi" =>"808"],
        ["di" =>310, "fi" =>"808"],
        ["di" =>412, "fi" =>"894"],
        ["di" =>416, "fi" =>"1135"],
        ["di" =>380, "fi" =>"1116"],
        ["di" =>490, "fi" =>"1048"],
        ["di" =>445, "fi" =>"1196"],
        ["di" =>422, "fi" =>"1136"],
        ["di" =>417, "fi" =>"1137"],
        ["di" =>75, "fi" =>"850"],
        ["di" =>264, "fi" =>"825"],
        ["di" =>155, "fi" =>"1085"],
        ["di" =>495, "fi" =>"740"],
        ["di" =>411, "fi" =>"526"],
        ["di" =>43, "fi" =>"883"],
        ["di" =>136, "fi" =>"1170"],
        ["di" =>202, "fi" =>"1210"],
        ["di" =>496, "fi" =>"756"],
        ["di" =>128, "fi" =>"1171"],
        ["di" =>574, "fi" =>"1201"],
        ["di" =>448, "fi" =>"1197"],
        ["di" =>265, "fi" =>"502"],
        ["di" =>266, "fi" =>"831"],
        ["di" =>283, "fi" =>"942"],
        ["di" =>267, "fi" =>"500"],
        ["di" =>307, "fi" =>"832"],
        ["di" =>270, "fi" =>"499"],
        ["di" =>292, "fi" =>"1033"],
        ["di" =>483, "fi" =>"1049"],
        ["di" =>199, "fi" =>"1076"],
        ["di" =>486, "fi" =>"1050"],
        ["di" =>88, "fi" =>"1186"],
        ["di" =>201, "fi" =>"1211"],
        ["di" =>268, "fi" =>"1034"],
        ["di" =>47, "fi" =>"1106"],
        ["di" =>559, "fi" =>"1158"],
        ["di" =>455, "fi" =>"1207"],
        ["di" =>533, "fi" =>"937"],
        ["di" =>418, "fi" =>"1138"],
        ["di" =>228, "fi" =>"803"],
        ["di" =>78, "fi" =>"1187"],
        ["di" =>456, "fi" =>"1208"],
        ["di" =>183, "fi" =>"1077"],
        ["di" =>192, "fi" =>"119"],
        ["di" =>196, "fi" =>"1078"],
        ["di" =>181, "fi" =>"773"],
        ["di" =>35, "fi" =>"874"],
        ["di" =>272, "fi" =>"836"],
        ["di" =>534, "fi" =>"942"],
        ["di" =>575, "fi" =>"1202"],
        ["di" =>160, "fi" =>"915"],
        ["di" =>71, "fi" =>"1125"],
        ["di" =>489, "fi" =>"1051"],
        ["di" =>497, "fi" =>"744"],
        ["di" =>397, "fi" =>"521"],
        ["di" =>498, "fi" =>"747"],
        ["di" =>58, "fi" =>"848"],
        ["di" =>535, "fi" =>"927"],
        ["di" =>318, "fi" =>"472"],
        ["di" =>499, "fi" =>"751"],
        ["di" =>344, "fi" =>"1082"],
        ["di" =>477, "fi" =>"1052"],
        ["di" =>396, "fi" =>"892"],
        ["di" =>403, "fi" =>"892"],
        ["di" =>151, "fi" =>"1086"],
        ["di" =>391, "fi" =>"1130"],
        ["di" =>203, "fi" =>"1212"],
        ["di" =>287, "fi" =>"1117"],
        ["di" =>536, "fi" =>"928"],
        ["di" =>518, "fi" =>"1143"],
        ["di" =>32, "fi" =>"870"],
        ["di" =>184, "fi" =>"778"],
        ["di" =>527, "fi" =>"1144"],
        ["di" =>330, "fi" =>"1097"],
        ["di" =>537, "fi" =>"946"],
        ["di" =>565, "fi" =>"966"],
        ["di" =>46, "fi" =>"1107"],
        ["di" =>342, "fi" =>"951"],
        ["di" =>131, "fi" =>"1172"],
        ["di" =>346, "fi" =>"1083"],
        ["di" =>165, "fi" =>"520"],
        ["di" =>162, "fi" =>"920"],
        ["di" =>229, "fi" =>"736"],
        ["di" =>152, "fi" =>"508"],
        ["di" =>121, "fi" =>"1240"],
        ["di" =>166, "fi" =>"911"],
        ["di" =>163, "fi" =>"921"],
        ["di" =>158, "fi" =>"911"],
        ["di" =>177, "fi" =>"1087"],
        ["di" =>164, "fi" =>"918"],
        ["di" =>179, "fi" =>"115"],
        ["di" =>538, "fi" =>"938"],
        ["di" =>55, "fi" =>"873"],
        ["di" =>501, "fi" =>"754"],
        ["di" =>159, "fi" =>"912"],
        ["di" =>572, "fi" =>"912"],
        ["di" =>230, "fi" =>"448"],
        ["di" =>576, "fi" =>"1203"],
        ["di" =>73, "fi" =>"1126"],
        ["di" =>312, "fi" =>"810"],
        ["di" =>482, "fi" =>"1053"],
        ["di" =>582, "fi" =>"1054"],
        ["di" =>315, "fi" =>"814"],
        ["di" =>459, "fi" =>"1233"],
        ["di" =>354, "fi" =>"1165"],
        ["di" =>258, "fi" =>"940"],
        ["di" =>255, "fi" =>"1021"],
        ["di" =>577, "fi" =>"1204"],
        ["di" =>314, "fi" =>"813"],
        ["di" =>249, "fi" =>"1068"],
        ["di" =>503, "fi" =>"753"],
        ["di" =>114, "fi" =>"1241"],
        ["di" =>446, "fi" =>"1198"],
        ["di" =>504, "fi" =>"750"],
        ["di" =>484, "fi" =>"1055"],
        ["di" =>142, "fi" =>"844"],
        ["di" =>200, "fi" =>"861"],
        ["di" =>273, "fi" =>"833"],
        ["di" =>585, "fi" =>"1022"],
        ["di" =>583, "fi" =>"1023"],
        ["di" =>100, "fi" =>"1221"],
        ["di" =>53, "fi" =>"1188"],
        ["di" =>274, "fi" =>"1056"],
        ["di" =>49, "fi" =>"1108"],
        ["di" =>250, "fi" =>"792"],
        ["di" =>435, "fi" =>"1177"],
        ["di" =>421, "fi" =>"1139"],
        ["di" =>539, "fi" =>"934"],
        ["di" =>316, "fi" =>"818"],
        ["di" =>479, "fi" =>"1057"],
        ["di" =>231, "fi" =>"1027"],
        ["di" =>521, "fi" =>"1145"],
        ["di" =>34, "fi" =>"793"],
        ["di" =>39, "fi" =>"878"],
        ["di" =>297, "fi" =>"1035"],
        ["di" =>275, "fi" =>"504"],
        ["di" =>375, "fi" =>"1118"],
        ["di" =>240, "fi" =>"1028"],
        ["di" =>294, "fi" =>"1036"],
        ["di" =>171, "fi" =>"1088"],
        ["di" =>95, "fi" =>"1189"],
        ["di" =>404, "fi" =>"1131"],
        ["di" =>469, "fi" =>"1157"],
        ["di" =>206, "fi" =>"456"],
        ["di" =>261, "fi" =>"1024"],
        ["di" =>62, "fi" =>"853"],
        ["di" =>410, "fi" =>"1234"],
        ["di" =>506, "fi" =>"746"],
        ["di" =>64, "fi" =>"460"],
        ["di" =>144, "fi" =>"1089"],
        ["di" =>63, "fi" =>"461"],
        ["di" =>146, "fi" =>"488"],
        ["di" =>578, "fi" =>"1205"],
        ["di" =>175, "fi" =>"1090"],
        ["di" =>393, "fi" =>"887"],
        ["di" =>392, "fi" =>"889"],
        ["di" =>377, "fi" =>"888"],
        ["di" =>554, "fi" =>"1159"],
        ["di" =>347, "fi" =>"781"],
        ["di" =>381, "fi" =>"786"],
        ["di" =>413, "fi" =>"1140"],
        ["di" =>378, "fi" =>"1119"],
        ["di" =>394, "fi" =>"890"],
        ["di" =>390, "fi" =>"514"],
        ["di" =>476, "fi" =>"1058"],
        ["di" =>540, "fi" =>"932"],
        ["di" =>513, "fi" =>"932"],
        ["di" =>420, "fi" =>"1141"],
        ["di" =>557, "fi" =>"1160"],
        ["di" =>510, "fi" =>"1146"],
        ["di" =>507, "fi" =>"757"],
        ["di" =>358, "fi" =>"1069"],
        ["di" =>463, "fi" =>"1235"],
        ["di" =>541, "fi" =>"929"],
        ["di" =>524, "fi" =>"1147"],
        ["di" =>359, "fi" =>"1070"],
        ["di" =>209, "fi" =>"1213"],
        ["di" =>147, "fi" =>"513"],
        ["di" =>481, "fi" =>"1059"],
        ["di" =>350, "fi" =>"784"],
        ["di" =>161, "fi" =>"515"],
        ["di" =>285, "fi" =>"1037"],
        ["di" =>150, "fi" =>"1091"],
        ["di" =>500, "fi" =>"1148"],
        ["di" =>395, "fi" =>"891"],
        ["di" =>379, "fi" =>"1120"],
        ["di" =>324, "fi" =>"891"],
        ["di" =>154, "fi" =>"916"],
        ["di" =>208, "fi" =>"1214"],
        ["di" =>143, "fi" =>"913"],
        ["di" =>398, "fi" =>"530"],
        ["di" =>525, "fi" =>"1149"],
        ["di" =>305, "fi" =>"1038"],
        ["di" =>584, "fi" =>"1161"],
        ["di" =>306, "fi" =>"745"],
        ["di" =>176, "fi" =>"1092"],
        ["di" =>38, "fi" =>"877"],
        ["di" =>357, "fi" =>"780"],
        ["di" =>353, "fi" =>"1167"],
        ["di" =>348, "fi" =>"782"],
        ["di" =>308, "fi" =>"806"],
        ["di" =>385, "fi" =>"1121"],
        ["di" =>447, "fi" =>"1199"],
        ["di" =>304, "fi" =>"1039"],
        ["di" =>331, "fi" =>"1098"],
        ["di" =>37, "fi" =>"1109"],
        ["di" =>408, "fi" =>"1132"],
        ["di" =>182, "fi" =>"774"],
        ["di" =>402, "fi" =>"1133"],
        ["di" =>42, "fi" =>"882"],
        ["di" =>399, "fi" =>"1134"],
        ["di" =>41, "fi" =>"1110"],
        ["di" =>370, "fi" =>"1071"],
        ["di" =>361, "fi" =>"1072"],
        ["di" =>96, "fi" =>"1190"],
        ["di" =>140, "fi" =>"1173"],
        ["di" =>193, "fi" =>"1079"],
        ["di" =>124, "fi" =>"505"],
        ["di" =>141, "fi" =>"1122"],
        ["di" =>449, "fi" =>"1200"],
        ["di" =>560, "fi" =>"802"],
        ["di" =>233, "fi" =>"802"],
        ["di" =>368, "fi" =>"1073"],
        ["di" =>33, "fi" =>"1111"],
        ["di" =>349, "fi" =>"1167"],
        ["di" =>56, "fi" =>"483"],
        ["di" =>442, "fi" =>"1178"],
        ["di" =>437, "fi" =>"1179"],
        ["di" =>423, "fi" =>"1180"],
        ["di" =>436, "fi" =>"1181"],
        ["di" =>81, "fi" =>"1191"],
        ["di" =>531, "fi" =>"1150"],
        ["di" =>278, "fi" =>"824"],
        ["di" =>139, "fi" =>"839"],
        ["di" =>430, "fi" =>"839"],
        ["di" =>543, "fi" =>"945"],
        ["di" =>234, "fi" =>"1029"],
        ["di" =>338, "fi" =>"1099"],
        ["di" =>94, "fi" =>"1192"],
        ["di" =>86, "fi" =>"1193"],
        ["di" =>59, "fi" =>"849"],
        ["di" =>61, "fi" =>"852"],
        ["di" =>400, "fi" =>"759"],
        ["di" =>366, "fi" =>"1074"],
        ["di" =>544, "fi" =>"935"],
        ["di" =>79, "fi" =>"1194"],
        ["di" =>135, "fi" =>"1174"],
        ["di" =>40, "fi" =>"879"],
        ["di" =>279, "fi" =>"519"],
        ["di" =>248, "fi" =>"795"],
        ["di" =>252, "fi" =>"796"],
        ["di" =>122, "fi" =>"1242"],
        ["di" =>429, "fi" =>"1182"],
        ["di" =>425, "fi" =>"1183"],
        ["di" =>444, "fi" =>"1184"],
        ["di" =>111, "fi" =>"1222"],
        ["di" =>545, "fi" =>"900"],
        ["di" =>253, "fi" =>"789"],
        ["di" =>302, "fi" =>"1040"],
        ["di" =>188, "fi" =>"771"],
        ["di" =>125, "fi" =>"506"],
        ["di" =>132, "fi" =>"965"],
        ["di" =>546, "fi" =>"926"],
        ["di" =>480, "fi" =>"1060"],
        ["di" =>345, "fi" =>"1084"],
        ["di" =>133, "fi" =>"1084"],
        ["di" =>508, "fi" =>"1169"],
        ["di" =>291, "fi" =>"1041"],
        ["di" =>514, "fi" =>"1042"],
        ["di" =>487, "fi" =>"1061"],
        ["di" =>50, "fi" =>"1112"],
        ["di" =>581, "fi" =>"1062"],
        ["di" =>580, "fi" =>"529"],
        ["di" =>213, "fi" =>"1215"],
        ["di" =>98, "fi" =>"1195"],
        ["di" =>414, "fi" =>"1142"],
        ["di" =>382, "fi" =>"1123"],
        ["di" =>51, "fi" =>"1113"],
        ["di" =>205, "fi" =>"867"],
        ["di" =>187, "fi" =>"1080"],
        ["di" =>509, "fi" =>"739"],
        ["di" =>254, "fi" =>"791"],
        ["di" =>214, "fi" =>"1216"],
        ["di" =>44, "fi" =>"884"],
        ["di" =>69, "fi" =>"1127"],
        ["di" =>67, "fi" =>"859"],
        ["di" =>293, "fi" =>"1043"],
        ["di" =>335, "fi" =>"1100"],
        ["di" =>126, "fi" =>"1175"],
        ["di" =>343, "fi" =>"953"],
        ["di" =>451, "fi" =>"1209"],
        ["di" =>519, "fi" =>"1151"],
        ["di" =>259, "fi" =>"1025"],
        ["di" =>180, "fi" =>"772"],
        ["di" =>460, "fi" =>"1236"],
        ["di" =>556, "fi" =>"1162"],
        ["di" =>317, "fi" =>"819"],
        ["di" =>57, "fi" =>"459"],
        ["di" =>60, "fi" =>"1128"],
        ["di" =>322, "fi" =>"815"],
        ["di" =>195, "fi" =>"1063"],
        ["di" =>148, "fi" =>"1093"],
        ["di" =>567, "fi" =>"760"],
        ["di" =>568, "fi" =>"898"],
        ["di" =>570, "fi" =>"907"],
        ["di" =>45, "fi" =>"885"],
        ["di" =>110, "fi" =>"1223"],
        ["di" =>99, "fi" =>"1224"],
        ["di" =>104, "fi" =>"1225"],
        ["di" =>109, "fi" =>"1226"],
        ["di" =>520, "fi" =>"1152"],
        ["di" =>281, "fi" =>"1153"],
        ["di" =>530, "fi" =>"1154"],
        ["di" =>511, "fi" =>"1155"],
        ["di" =>130, "fi" =>"1176"],
        ["di" =>112, "fi" =>"1243"],
        ["di" =>48, "fi" =>"1114"],
        ["di" =>579, "fi" =>"1206"],
        ["di" =>269, "fi" =>"1044"],
        ["di" =>351, "fi" =>"785"],
        ["di" =>216, "fi" =>"1217"],
        ["di" =>54, "fi" =>"1115"],
        ["di" =>105, "fi" =>"1227"],
        ["di" =>282, "fi" =>"1228"],
        ["di" =>31, "fi" =>"869"],
        ["di" =>217, "fi" =>"1229"],
        ["di" =>218, "fi" =>"1230"],
        ["di" =>462, "fi" =>"1237"],
        ["di" =>465, "fi" =>"1238"],
        ["di" =>241, "fi" =>"1030"],
        ["di" =>340, "fi" =>"1101"],
        ["di" =>120, "fi" =>"1244"],
        ["di" =>117, "fi" =>"1245"],
        ["di" =>256, "fi" =>"1026"],
        ["di" =>167, "fi" =>"1094"],
        ["di" =>475, "fi" =>"1064"],
        ["di" =>485, "fi" =>"1065"],
        ["di" =>235, "fi" =>"1031"],
        ["di" =>236, "fi" =>"447"],
        ["di" =>551, "fi" =>"1163"],
        ["di" =>319, "fi" =>"473"],
        ["di" =>325, "fi" =>"1102"],
        ["di" =>242, "fi" =>"1032"],
        ["di" =>174, "fi" =>"1095"],
        ["di" =>215, "fi" =>"1218"],
        ["di" =>547, "fi" =>"939"],
        ["di" =>85, "fi" =>"857"],
        ["di" =>332, "fi" =>"1103"],
        ["di" =>571, "fi" =>"904"],
        ["di" =>555, "fi" =>"1164"],
        ["di" =>548, "fi" =>"930"],
        ["di" =>296, "fi" =>"1045"],
        ["di" =>373, "fi" =>"1075"],
        ["di" =>474, "fi" =>"1066"],
        ["di" =>191, "fi" =>"1081"],
        ["di" =>452, "fi" =>"758"],
        ["di" =>66, "fi" =>"858"],
        ["di" =>549, "fi" =>"933"],
        ["di" =>313, "fi" =>"1104"],
        ["di" =>221, "fi" =>"1231"],
        ["di" =>157, "fi" =>"910"],
        ["di" =>309, "fi" =>"807"],
        ["di" =>550, "fi" =>"949"],
        ["di" =>280, "fi" =>"1046"],
        ["di" =>387, "fi" =>"1124"],
        ["di" =>433, "fi" =>"1185"],
        ["di" =>334, "fi" =>"1105"],

    ];
    foreach ($subcategories as $subcate) {
        if ($subcate['di'] == $di){
            return $subcate['fi']; // Return the name of the state
        }
    }
}

$count = 0;
//$brands = $pdo2->query("SELECT users.*, brands.* FROM users INNER JOIN brands ON users.id = brands.user_id WHERE brands.profile_type = 'dealer' AND users.is_verified = 1 AND brands.profile_status = 12 LIMIT 4000,500");
$brands = $pdo2->query("SELECT users.*, brands.* FROM users INNER JOIN brands ON users.id = brands.user_id WHERE brands.profile_type = 'dealer' AND brands.profile_status = 12 AND brands.brand_id = 8971

");

while ($brand = $brands->fetch_object()) { //print_r($brand); exit;

    $citydata = $pdo2->query("SELECT * FROM cities WHERE id = '$brand->comp_city'");
    $city       = $citydata->fetch_object();
    $cityName   = $city->city_name;
    $stateName  = _getstate($city->state_id);

    $categorydata = $pdo2->query("SELECT * FROM brand_categories WHERE brand_id = '$brand->brand_id'");
    $category     = $categorydata->fetch_object();
    $industry_id  = $category->industry_id;
    $sect_id    = $category->sector_id;

    $industry_cat = _getIndCat($industry_id);
    $sector_cat     =_getIndSubCat($sect_id);


    $mininv = $brand->min_investment;
    $maxinv = $brand->max_investment;

    if($mininv <= '10000') {
        $mininv = '10000';
    }
    elseif($mininv <= '50000') {
        $mininv = '50000';
    }
    elseif($mininv <= '200000') {
        $mininv = '200000';
    }
    elseif($mininv <= '500000') {
        $mininv = '500000';
    }
    elseif($mininv <= '1000000') {
        $mininv = '1000000';
    }   
    elseif($mininv <= '2000000') {
        $mininv = '2000000';
    }
    elseif($mininv <= '3000000') {
        $mininv = '3000000';
    }
    elseif($mininv <= '5000000') {
        $mininv = '5000000';
    }
    elseif($mininv <= '10000000') {
        $mininv = '10000000';    
    }
    elseif($mininv <= '20000000') {
        $mininv = '20000000';
    }
    elseif($mininv <= '50000000') {
        $mininv = '50000000';
    }
    
    
    
    if($maxinv <= '50000') {
        $maxinv = '50000';
    }
    elseif($maxinv <= '200000') {
        $maxinv = '200000';
    }
    elseif($maxinv <= '500000') {
        $maxinv = '500000';
    }
    elseif($maxinv <= '1000000') {
        $maxinv = '1000000';
    }   
    elseif($maxinv <= '2000000') {
        $maxinv = '2000000';
    }
    elseif($maxinv <= '3000000') {
        $maxinv = '3000000';
    }
    elseif($maxinv <= '5000000') {
        $maxinv = '5000000';
    }
    elseif($maxinv <= '10000000') {
        $maxinv = '10000000';    
    }
    elseif($maxinv <= '20000000') {
        $maxinv = '20000000';
    }
    elseif($maxinv <= '100000000') {
        $maxinv = '100000000';
    }
    
    if($brand->franchise_start_year < 1) {
        $fstart_year = $brand->estab_year;
    }
    else {
        $fstart_year = $brand->franchise_start_year;
    }
    

    $email              = $brand->email;
    $password           = $brand->password;
    $mobile             = $brand->mobile;
    $name               = $brand->name;
    $profile_status     = 1;
    $profile_type       = 1;
    $data_source        = "di";
    $created_at         = $brand->created_at;
    $updated_at         = $brand->updated_at;
//brand details
$profile_name           = strtolower($pdo2->real_escape_string($brand->profile_name)); 
$company_name           = $pdo2->real_escape_string($brand->company_name); 
$brand_name             = $pdo2->real_escape_string($brand->brand_name); 
$ceo_name               = $pdo2->real_escape_string($brand->owner_name); 
$ceo_email              = $brand->owner_email; 
$ceo_mobile             = $brand->mobile; 
$fran_manager           = $pdo2->real_escape_string($brand->fran_manager); 
$fran_address           = ""; 
$country                = 'india'; 
$pincode                = $brand->comp_pincode; 
$state                  = $stateName; // id insert hoti hai 
$city                   = $cityName; // id insert hoti hai 
$telephone              = $brand->ph_landline; 
$fax                    = ''; 
$secondary_email        = $brand->alt_email; 
$website                = $brand->comp_website; 
$ind_main_cat           = '5'; 
$ind_cat                = $industry_cat; 
$ind_sub_cat            = $sector_cat; 
$operations_start_year  = $brand->estab_year; 
$franchise_start_year   = $fstart_year; 
$no_fran_outlets        = 'Less than 10'; 
$no_retail_outlets      = $brand->no_retail_outlets; 
$no_company_outlets     = $brand->no_company_outlets; 
$outlet_locations       = $brand->outlet_locations; 
$marketting_materials   = $brand->marketting_materials; 
$business_desc          = $pdo2->real_escape_string($brand->comp_desc); 
$business_desc_hindi    = '';
$business_desc_update   = '';
$looking_franchise      = ''; 
$looking_tradepartner   = ''; 
$is_dealer_distributor  = 1; // business type insert hoti hai
$franchise_partner_type = $pdo2->real_escape_string($brand->franchise_partner_type); 
$unit_investment        = ''; 
$unit_inv_min           = $mininv; 
$unit_inv_max           = $maxinv; 
$unitinv_brand_fee      = $pdo2->real_escape_string($brand->unitinv_brand_fee); 
$unitinv_royalty        = $pdo2->real_escape_string($brand->unitinv_royalty); 
$is_looking_intl_franchise  = $pdo2->real_escape_string($brand->is_looking_intl_franchise);   
$expansion_loc_type     = ''; 
$expansion_location     = ''; 
$preferred_cities       = ''; 
$is_territorial_rights   = $pdo2->real_escape_string($brand->is_territorial_rights); 
$is_perform_guarranty    = '';
$is_marketting_levies    = '';
$anticipated_roi         = $pdo2->real_escape_string($brand->anticipated_roi); 
$payback_period          = $pdo2->real_escape_string($brand->payback_period);    
$other_investment_req    = $pdo2->real_escape_string($brand->other_investment_req); 
$is_finance_aid          = $pdo2->real_escape_string($brand->is_finance_aid); 
$property_type           = $pdo2->real_escape_string($brand->property_type); 
$pref_prop_location      = $pdo2->real_escape_string($brand->pref_prop_location); 
$prop_area_min           = $brand->prop_area_min; 
$prop_area_max           = $brand->prop_area_max; 
$premise_outfit_arrangement= ''; 
$site_selection_assistance= '';
$is_detailed_manuals      = '';  
$franchise_training_loc   = ''; 
$is_field_assistance      = $pdo2->real_escape_string($brand->is_field_assistance); 
$ho_assistance           = $pdo2->real_escape_string($brand->ho_assistance); 
$is_it_support           = $pdo2->real_escape_string($brand->is_it_support);
$std_fran_aggreement     = $pdo2->real_escape_string($brand->std_fran_aggreement);
$franchise_term_duration  = ''; 
$term_renewable          = $pdo2->real_escape_string($brand->term_renewable); 

$membership_plan          = 401; 
$company_logo             = $brand->comp_logo; 
$pre_approved_logo        = ""; 
$free_logo_visibility     = 1; 
$fibl_brands              = ""; 
$video_link               = ""; 
$membership_type          = 0; 
$membership_weightage     = ""; 
$membership_weightage_backup    = ""; 
$views                      = 1; 
$page_layout_type           = ""; 
$is_hindi                   = '';
$is_intl                    = ""; 
$is_international_client    = ""; 
$is_fixed_brand             = ""; 
$is_event                   = ""; 
$franchisor_type            = 1; 
$profile_status             = 1; 
$fleads_status              = ""; 
$is_campaign_updated        = ""; 
$step_completed             = ""; 
$update_request             = ""; 
$registered_by              = ""; 
$updated_by                 = ""; 
$activation_date            = ""; 
$activated_by               = ""; 
$activated_at               = $brand->activated_at; 
$brand_verified             = ""; 
$verified_valid_date        = ""; 

    $newFranchiseId = 'FIHL' . str_pad(rand(0, 999999), 7, '0', STR_PAD_LEFT);
    $stmt = $pdo1->query("SELECT COUNT(*) AS count FROM user_accounts WHERE email = '$email'");

	echo "<br>SELECT COUNT(*) AS count FROM user_accounts WHERE email = '$email'<br>";
	
    $yy = $stmt->fetch_object();
    if ($yy->count == 0) {
        do {
            $newFranchiseId = 'FIHL' . str_pad(rand(0, 999999), 7, '0', STR_PAD_LEFT);
            // Check if the generated ID already exists in franchisor_business_details
			echo "<br>SELECT profile_str FROM user_accounts WHERE profile_str = '$newFranchiseId'<br>";
			
            $checkQuery = $pdo1->query("SELECT profile_str FROM user_accounts WHERE profile_str = '$newFranchiseId'");
            $fid = $checkQuery->fetch_object();
        } while ($fid->profile_str > 0); // Repeat until a unique ID is generated
		$pdo1->query("SET sql_mode = ''");
        echo "<br>Generated new franchise_id: $newFranchiseId<br>";
		echo "<br>INSERT INTO user_accounts (email,password,mobile,name,membership_type,membership_plan,profile_type,profile_status,profile_str,data_source,created_at,updated_at) VALUES ('$email', '$password', '$mobile', '$name', '$membership_type', '$membership_plan', '$profile_type','$profile_status','$newFranchiseId','$data_source','$created_at','$updated_at')";
			echo "<br>INSERT INTO franchisor_business_details (franchisor_id,profile_name,company_name,brand_name,ceo_name,ceo_email,ceo_mobile,fran_manager,fran_address,country,pincode,state,city,telephone,fax,secondary_email,website,ind_main_cat,ind_cat,ind_sub_cat,operations_start_year,franchise_start_year,no_fran_outlets,no_retail_outlets,no_company_outlets,outlet_locations,marketting_materials,business_desc,business_desc_hindi,business_desc_update,looking_franchise,looking_tradepartner,is_dealer_distributor,franchise_partner_type,unit_investment,unit_inv_min,unit_inv_max,unitinv_brand_fee,unitinv_royalty,is_looking_intl_franchise,expansion_loc_type,expansion_location,preferred_cities,is_territorial_rights,is_perform_guarranty,is_marketting_levies,anticipated_roi,payback_period,other_investment_req,is_finance_aid,property_type,pref_prop_location,prop_area_min,prop_area_max,premise_outfit_arrangement,site_selection_assistance,is_detailed_manuals,franchise_training_loc,is_field_assistance,ho_assistance,is_it_support,std_fran_aggreement,franchise_term_duration,term_renewable,membership_plan,company_logo,pre_approved_logo,free_logo_visibility,fibl_brands,video_link,membership_type,membership_weightage,membership_weightage_backup,views,page_layout_type,is_hindi,is_intl,is_international_client,is_fixed_brand,is_event,franchisor_type,profile_status,fleads_status,is_campaign_updated,step_completed,update_request,registered_by,updated_by,activation_date,activated_by,activated_at,created_at,updated_at,brand_verified,verified_valid_date)
         VALUES ('$newFranchiseId','$profile_name','$company_name','$brand_name','$ceo_name','$ceo_email','$ceo_mobile','$fran_manager','$fran_address','$country','$pincode','$state','$city','$telephone','$fax','$secondary_email','$website','$ind_main_cat','$ind_cat','$ind_sub_cat','$operations_start_year','$franchise_start_year','$no_fran_outlets','$no_retail_outlets','$no_company_outlets','$outlet_locations','$marketting_materials','$business_desc','$business_desc_hindi','$business_desc_update','$looking_franchise','$looking_tradepartner','$is_dealer_distributor','$franchise_partner_type','$unit_investment','$unit_inv_min','$unit_inv_max','$unitinv_brand_fee','$unitinv_royalty','$is_looking_intl_franchise','$expansion_loc_type','$expansion_location','$preferred_cities','$is_territorial_rights','$is_perform_guarranty','$is_marketting_levies','$anticipated_roi','$payback_period','$other_investment_req','$is_finance_aid','$property_type','$pref_prop_location','$prop_area_min','$prop_area_max','$premise_outfit_arrangement','$site_selection_assistance','$is_detailed_manuals','$franchise_training_loc','$is_field_assistance','$ho_assistance','$is_it_support','$std_fran_aggreement','$franchise_term_duration','$term_renewable','$membership_plan','$company_logo','$pre_approved_logo','$free_logo_visibility','$fibl_brands','$video_link','$membership_type','$membership_weightage','$membership_weightage_backup','$views','$page_layout_type','$is_hindi','$is_intl','$is_international_client','$is_fixed_brand','$is_event','$franchisor_type','$profile_status','$fleads_status','$is_campaign_updated','$step_completed','$update_request','$registered_by','$updated_by','$activation_date','$activated_by','$activated_at','$created_at','$updated_at','$brand_verified','$verified_valid_date')";
		 
	echo "INSERT INTO franchisor_tradepartners (franchisor_id,channel_type,trade_investment,trade_margin,area_min,area_max,area_type,created_at,updated_at) VALUES ('$newFranchiseId',5,7,0,'$prop_area_min','$prop_area_max','','$created_at','$updated_at')";		 
		 
        $insert_stmt = $pdo1->query("INSERT INTO user_accounts (email,password,mobile,name,membership_type,membership_plan,profile_type,profile_status,profile_str,data_source,created_at,updated_at) VALUES ('$email', '$password', '$mobile', '$name', '$membership_type', '$membership_plan', '$profile_type','$profile_status','$newFranchiseId','$data_source','$created_at','$updated_at')");
        $insert_stmt = $pdo1->query("INSERT INTO franchisor_business_details (franchisor_id,profile_name,company_name,brand_name,ceo_name,ceo_email,ceo_mobile,fran_manager,fran_address,country,pincode,state,city,telephone,fax,secondary_email,website,ind_main_cat,ind_cat,ind_sub_cat,operations_start_year,franchise_start_year,no_fran_outlets,no_retail_outlets,no_company_outlets,outlet_locations,marketting_materials,business_desc,business_desc_hindi,business_desc_update,looking_franchise,looking_tradepartner,is_dealer_distributor,franchise_partner_type,unit_investment,unit_inv_min,unit_inv_max,unitinv_brand_fee,unitinv_royalty,is_looking_intl_franchise,expansion_loc_type,expansion_location,preferred_cities,is_territorial_rights,is_perform_guarranty,is_marketting_levies,anticipated_roi,payback_period,other_investment_req,is_finance_aid,property_type,pref_prop_location,prop_area_min,prop_area_max,premise_outfit_arrangement,site_selection_assistance,is_detailed_manuals,franchise_training_loc,is_field_assistance,ho_assistance,is_it_support,std_fran_aggreement,franchise_term_duration,term_renewable,membership_plan,company_logo,pre_approved_logo,free_logo_visibility,fibl_brands,video_link,membership_type,membership_weightage,membership_weightage_backup,views,page_layout_type,is_hindi,is_intl,is_international_client,is_fixed_brand,is_event,franchisor_type,profile_status,fleads_status,is_campaign_updated,step_completed,update_request,registered_by,updated_by,activation_date,activated_by,activated_at,created_at,updated_at,brand_verified,verified_valid_date)
         VALUES ('$newFranchiseId','$profile_name','$company_name','$brand_name','$ceo_name','$ceo_email','$ceo_mobile','$fran_manager','$fran_address','$country','$pincode','$state','$city','$telephone','$fax','$secondary_email','$website','$ind_main_cat','$ind_cat','$ind_sub_cat','$operations_start_year','$franchise_start_year','$no_fran_outlets','$no_retail_outlets','$no_company_outlets','$outlet_locations','$marketting_materials','$business_desc','$business_desc_hindi','$business_desc_update','$looking_franchise','$looking_tradepartner','$is_dealer_distributor','$franchise_partner_type','$unit_investment','$unit_inv_min','$unit_inv_max','$unitinv_brand_fee','$unitinv_royalty','$is_looking_intl_franchise','$expansion_loc_type','$expansion_location','$preferred_cities','$is_territorial_rights','$is_perform_guarranty','$is_marketting_levies','$anticipated_roi','$payback_period','$other_investment_req','$is_finance_aid','$property_type','$pref_prop_location','$prop_area_min','$prop_area_max','$premise_outfit_arrangement','$site_selection_assistance','$is_detailed_manuals','$franchise_training_loc','$is_field_assistance','$ho_assistance','$is_it_support','$std_fran_aggreement','$franchise_term_duration','$term_renewable','$membership_plan','$company_logo','$pre_approved_logo','$free_logo_visibility','$fibl_brands','$video_link','$membership_type','$membership_weightage','$membership_weightage_backup','$views','$page_layout_type','$is_hindi','$is_intl','$is_international_client','$is_fixed_brand','$is_event','$franchisor_type','$profile_status','$fleads_status','$is_campaign_updated','$step_completed','$update_request','$registered_by','$updated_by','$activation_date','$activated_by','$activated_at','$created_at','$updated_at','$brand_verified','$verified_valid_date')");

        $insert_stmt = $pdo1->query("INSERT INTO franchisor_tradepartners (franchisor_id,channel_type,trade_investment,trade_margin,area_min,area_max,area_type,created_at,updated_at) VALUES ('$newFranchiseId',5,7,0,'$prop_area_min','$prop_area_max','','$created_at','$updated_at')");

	
        $count++;
    }
    $stmt->free();
}
echo "$count new email records were inserted into the test1811 table.";
$pdo2->close();
$pdo1->close();



/*

$brands = $pdo2->query("SELECT users.email, brands.brand_id FROM users INNER JOIN brands ON users.id = brands.user_id WHERE brands.profile_type = 'dealer' AND users.is_verified = 1 AND users.user_type = 'seller' AND brands.profile_status = 12 AND brands.brand_id = 1001");
while($brand = $brands->fetch_object()) {// print_r($brand);// exit;
                  $email              = $brand->email;
                  $bid                = $brand->brand_id;
				echo "SELECT franchisor_business_details.fran_detail_id FROM user_accounts INNER JOIN franchisor_business_details ON user_accounts.profile_str = franchisor_business_details.franchisor_id WHERE user_accounts.email = '$email'";
    $fquery = $pdo2->query("SELECT franchisor_business_details.fran_detail_id FROM user_accounts INNER JOIN franchisor_business_details ON user_accounts.profile_str = franchisor_business_details.franchisor_id WHERE user_accounts.email = '$email'");
   // $fquery = $pdo2->query("SELECT fran_detail_id FROM franchisor_business_details WHERE fran_detail_id = 70");

   // $fquery = $pdo2->query("SELECT brandId FROM forms WHERE form_id = 1");
    $fdata          = $fquery->fetch_object();
	echo "aa";
	print_r($fdata); exit;
	
  echo  $fbid    = $fdata->fran_detail_id;
	if($bid != ""){
		//$uquery = $pdo2->query("UPDATE brands SET new_brand_id = '$fbid' WHERE brand_id = '$bid'");
		echo "UPDATE brands SET new_brand_id = '$fbid' WHERE brand_id = '$bid'";
	}

}
//$pdo2->query("SET sql_mode = ''");

/*
$brands = $pdo2->query("SELECT `franchise_id`, id FROM `brands` WHERE `brand_id` IN ('29321042', '3824', '4510', '4771', '4986', '5292', '4712', '5296', '4977', '4562', '5094', '4501', '3776', '5104', '2475', '4641', '3926', '29320882', '5191', '4279', '4404', '5054', '5254', '4531', '29321016', '4939', '4850', '4506', '4151', '5050', '5233', '2557', '4958', '5012', '4335', '5675', '5023', '4534', '3778', '5178', '3491', '4287', '5140', '5411', '4919', '4993', '5270', '4257', '4389', '6057', '4162', '5302', '4407', '4227', '3937', '4207', '4163', '2399', '3858', '4134', '2950', '5918', '2484', '4467', '5081', '29320767', '5049', '29320022', '3992', '5122', '5074', '5217', '1888', '29321056', '4900', '5163', '1312', '4401', '4285', '29321044', '4436', '1657', '5214', '5047', '4373', '1819', '4735', '5234', '4944', '4089', '4579', '29320894', '5961', '4811', '3821', '4392', '5406', '4128', '4452', '5172', '5093', '29320971', '1232', '3710', '4921', '4123', '4801', '4374', '29320262', '4920', '4574', '4945', '1251', '4294', '4299', '4209', '2963', '4799', '4740', '29320883', '3906', '29320835', '29320982', '29320922', '29320137', '5335', '29320908', '29320912', '4292', '5351', '4564', '4980', '5110', '4972', '5213', '5261', '5130', '29321045', '4941', '4736', '5350', '4597', '4323', '1524', '4907', '5015', '3721', '5300', '4149', '4861', '4411', '4602', '5925', '4923', '3779', '1988', '4446', '3894', '4394', '4855', '3940', '5141', '6042', '4976', '4177', '5942', '5305', '5070', '5722', '2144', '3766', '29321055', '4751', '3875', '3323', '5299', '3798', '4938', '5029', '4486', '4733', '6045', '4470', '5046', '5155', '4814', '4011', '3794', '5095', '4101', '29320867', '5258', '5190', '4020', '1863', '3741', '29320968', '5248', '29320995', '5075', '3895', '5227', '4325', '4902', '1675', '4286', '5171', '29320939', '4606', '5959', '4342', '5036', '1623', '4810', '3708', '1075', '5264', '4587', '2935', '4426', '3907', '4160', '4996', '3769', '4929', '5353', '3943', '1028', '6047', '1601', '4716', '4695', '4985', '4035', '5304', '29321062', '29320837', '4558', '3756', '1339', '2606', '5113', '3955', '5136', '4782', '4366', '29320785', '4157', '4184', '2166', '4181', '4068', '4099', '29320069', '4684', '5976', '3737', '5308', '2699', '4193', '4823', '4115', '4487', '5107', '4305', '1351', '4973', '4845', '5244', '4395', '5298', '4705', '4974', '3942', '5403', '5079', '4525', '3830', '5303', '5962', '5160', '1087', '2465', '4859', '6032', '3928', '4433', '4304', '1381', '4413', '4971', '4836', '5013', '2289', '29320863', '4884', '29320892', '4523', '29321058', '29320960', '4774', '4591', '4473', '4830', '1738', '4624', '5215', '3026', '4349', '4167', '2329', '5055', '5165', '29320872', '4166', '5945', '5667', '3760', '5044', '4693', '5102', '4933', '29320899', '29320819', '4042', '3854', '5187', '4007', '5137', '5212', '4780', '29321001', '4948', '4896', '4412', '29320964', '4851', '5337', '5284', '4853', '4964', '29320791', '5924', '4781', '29321024', '3669', '4951', '3681', '3841', '5159', '5404', '4532', '5196', '29320878', '3922', '3818', '3954', '29320309', '5359', '5035', '5405', '3844', '4419', '4815', '3777', '3975', '5544', '4634', '4950', '5057', '1301', '4220', '29321017', '4642', '1458', '4216', '2716', '4252', '29320953', '5003', '29320956', '5121', '4076', '1210', '5045', '4533', '5090', '29320980', '4400', '4563', '5281', '4936', '4895', '29320931', '4383', '29320811', '1281', '29321004', '5179', '5762', '29321033', '4818', '4269', '5692', '4000', '4777', '4946', '4960', '4075', '4509', '3762', '1217', '4668', '4230', '4847', '5175', '5117', '5139', '5205', '4887', '3999', '4886', '2381', '29320998', '3916', '5184', '5927', '4126', '4743', '3761', '4656', '5562', '4066', '3764', '4418', '4592', '4301', '29320975', '5225', '4998', '5348', '5526', '29320916', '5376', '3860', '3883', '4669', '4819', '5410', '29320873', '4840', '3947', '4750', '4615', '2936', '29321087', '29320978', '4434', '4526', '29320801', '4119', '2483', '29321003', '3890', '29320832', '29320788', '4898', '5080', '29321040', '2322', '5167', '2397', '4822', '4744', '4910', '4631', '29320906', '5133', '4331', '3731', '3856', '5061', '4328', '4422', '2485', '4566', '4125', '3846', '29320973', '4225', '5250', '1826', '29320993', '4298', '5082', '5928', '5317', '4759', '4427', '3695', '2986', '5263', '5161', '4129', '4111', '4959', '29321309', '29320777', '5913', '5395', '5085', '5269', '4021', '29320988', '4477', '3782', '1016', '4357', '3951', '1735', '2238', '5101', '5939', '5076', '5124', '5206', '4449', '4455', '1404', '5290', '5399', '4699', '4833', '5166', '4175', '3599', '3933', '1550', '4312', '4873', '29320776', '4875', '5311', '3886', '5396', '1324', '4802', '4807', '4913', '1089', '3738', '29320775', '5666', '4937', '2807', '4280', '4970', '29320796', '4132', '3843', '4983', '5204', '5370', '4989', '3941', '3717', '3706', '3011', '4994', '1833', '4657', '3969', '4725', '29320800', '5276', '5007', '4957', '2835', '5409', '4361', '4248', '2141', '3912', '4508', '4658', '1148', '4350', '5034', '5247', '5273', '29320844', '29320929', '5221', '5109', '5372', '2721', '5314', '4573', '4779', '4250', '3935', '29320907', '3770', '5226', '3887', '4832', '29321039', '5377', '4158', '29320965', '1814', '5116', '4456', '4917', '4548', '4028', '29320397', '4638', '4644', '29320787', '3051', '29320938', '4790', '4559', '4925', '5120', '5064', '1536', '3994', '4118', '1591', '1727', '29321326', '3753', '3953', '3853', '4038', '2372', '5344', '5129', '29320795', '5100', '5380', '4223', '5202', '3715', '3924', '5252', '4857', '4775', '4326', '5063', '2406', '4625', '29320793', '4932', '5000', '29321023', '4168', '4842', '4376', '2223', '4265', '4829', '29320885', '5173', '4882', '4987', '1585', '3908', '1409', '1376', '4881', '4963', '4867', '5118', '4831', '29320316', '5365', '5125', '3974', '4469', '4793', '4869', '5748', '29321066', '4821', '4368', '4809', '29321005', '4702', '29320992', '4081', '4086', '4497', '5266', '4877', '5554', '5841', '4778', '3985', '29321041', '4036', '3901', '1366', '4594', '4947', '29321034', '4766', '3825', '4439', '29320771', '4665', '4711', '3902', '4866', '4578', '4348', '3767', '4652', '3845', '4903', '5316', '29320905', '5293', '4999', '5347', '4136', '4198', '4340', '29320786', '3666', '5255', '4351', '29321022', '1603', '3758', '29320876', '4264', '4310', '4604', '4173', '3044', '29320656', '4826', '3988', '4760', '4908', '4117', '4541', '5177', '4805', '5158', '5960', '4543', '3986', '5929', '4704', '5958', '4885', '29320932', '3888', '5341', '4817', '3936', '3838', '5043', '3799', '3725', '4626', '4589', '4450', '4927', '4874', '4846', '4147', '4189', '4212', '29321050', '29320961', '29321008', '29321009', '4444', '4338', '3787', '4321', '4333', '3857', '29321333', '29320904', '4756', '5162', '3184', '4124', '4979', '5011', '4982', '4714', '2278', '1602', '5108', '4403', '5366', '29320778', '4172', '4251', '4472', '5243', '29320851', '29320970', '4798', '3959', '5663', '4504', '4515', '4662', '29320942', '1700', '5128', '4088', '4806', '3903', '4013', '1624', '4253', '5242', '5169', '3754', '3143', '4377', '4854', '4916', '3948', '3915', '4001', '5068', '4122', '1053', '4048', '4549', '4447', '29320200', '3864', '4961', '3831', '6035', '4143', '5379', '5072', '5285', '29321063', '4738', '5105', '2543', '5367', '5364', '4698', '5374', '29320043', '29321061', '4213', '4734', '4645', '4605', '4870', '4112', '2961', '5210', '4113', '29320865', '4380', '5360', '2977', '5065', '3925', '4169', '3604', '3957', '5059', '4797', '4824', '4730', '3718', '4311', '4619', '5567', '5089', '5282', '4240', '4747', '5224', '4161', '5193', '29321334', '2555', '4713', '29320205', '4827', '4880', '3871', '4314', '3804', '29320952', '3768', '4891', '4893', '4511', '5236', '5126', '5008', '29320984', '4114', '4863', '4800', '29320817', '4607', '5400', '1230', '4246', '4142', '5402', '4006', '4868', '29320940', '4499', '4330', '5947', '5084', '4621', '5091', '3819', '4990', '6036', '6049', '5181', '1410', '4153', '4754', '3523', '1161', '4596', '29320119', '5306', '3466', '29320966', '5312', '3701', '5310', '29320650', '5940', '3876', '4341', '5194', '4512', '4969', '4978', '4457', '4002', '4315', '5392', '5575', '3980', '29320808', '4758', '4962', '29320985', '4369', '3736', '5257', '2971', '29320990', '4261', '3930', '4317', '5218', '2463', '4598', '6050', '29321353', '4078', '5066', '5944', '4992', '5279', '1902', '4943', '1829', '4005', '5280', '5168', '29321373', '6118', '4521', '4858', '3938', '4319', '4318', '5240', '29320813', '3958', '5056', '4440', '4442', '4792', '2538', '4934', '4906', '1302', '5272', '4391', '4120', '4661', '4901', '1012', '4681', '5339', '1253', '5060', '6033', '4215', '4991', '5393', '3842', '3244', '1392', '4445', '1637', '4931', '4834', '4388', '5283', '29320840', '29320822', '5014', '1412', '29320881', '5267', '5164', '4892', '5315', '4234', '4187', '5071', '29320977', '4430', '29320847', '5199', '29321068', '5207', '4794', '4241', '29321030', '4926', '1811', '3927', '6048', '4203', '5106', '5209', '5170', '5256', '4224', '6034', '5111', '5265', '5288', '2929', '4199', '3881', '3976', '4635', '5297', '4140', '4385', '1136', '4202', '4355', '5354', '4229', '4988', '4722', '5253', '5407', '4148', '29320890', '5349', '4428', '4670', '5078', '4843', '4614', '5198', '4451', '4757', '4816', '4749', '3836', '3527', '29320826', '3896', '4745', '5040', '5241', '29321067', '4131', '4461', '4324', '5186', '4637', '1293', '4204', '5189', '4266', '4448', '5127', '4520', '5188', '5426', '3964', '4023', '4616', '3966', '3833', '5340', '5092', '29320798', '5058', '4894', '5203', '4966', '5287', '4268', '4084', '4107', '4034', '4776', '2866', '3870', '4897', '4761', '3862', '4354', '4004', '4787', '4732', '4217', '29320806', '4274', '29321090', '4290', '1987', '4795', '3704', '5134', '5455', '29321047', '29321051', '4683', '4595', '4841', '4022', '3720', '3177', '5069', '5053', '4219', '4839', '4804', '4876', '5009', '4955', '5496', '29321046', '3665', '3775', '4065', '4396', '5294', '4271', '2207', '3897', '3672', '5295', '4984', '29320772', '3909', '3793', '3730', '29320909', '4409', '4437', '4803', '5115', '4643', '4025', '3757', '4017', '4050', '4584', '4659', '5223', '3765', '4741', '4197', '4585', '4039', '4018', '4586', '5235', '3996', '3786', '5192', '4975', '4544', '4306', '4739', '5286', '4425', '2299', '5229', '4008', '5185', '5926', '4552', '29321014', '4272', '3978', '4640', '29320803', '4386', '5978', '5180', '5289', '4981', '4848', '5408', '5313', '5220', '3900', '4924', '5957', '4322', '4879', '29320886', '4178', '5077', '3084', '2970', '5103', '4632', '5216', '5222', '2362', '4214', '5001', '4889', '4808', '4063', '5386', '5398', '3652', '4302', '5156', '3739', '4746', '5356', '3707', '4909', '4997', '4655', '3861', '29321048', '3898', '3735', '4191', '4922', '4856', '4254', '4303', '5211', '29320805', '4610', '4773', '29320827', '5345', '5038', '4263', '4332', '5358', '4309', '5387', '3884', '2955', '4883', '5231', '4026', '5378', '4031', '3254', '5088', '4748', '2696', '5114', '29320999', '2642', '2595', '2625', '4622', '4796', '5343', '29320877', '4416', '4159', '6046', '29320188', '4105', '5375', '4398', '2021', '4914', '5201', '3977', '5246', '5307', '6044', '5230', '4222', '3972', '29320889', '29320951', '4628', '5291', '1518', '3204', '5251', '5401', '4102', '5363', '5010', '3919', '5195', '4935', '4188', '3905', '5197', '3576', '29321060', '29320900', '3827', '4636', '4849', '4146', '4228', '4371', '4058', '4297', '4110', '4915', '4862', '4003', '3995', '29321018', '4024', '5098', '4116', '3743', '3882', '4077', '4553', '4027', '29321297', '1758', '5037', '29320809', '5385', '4639', '5946', '4205', '5142', '4358', '4320', '29320790', '5309', '4347', '5274', '29320888', '29320780', '4954', '5051', '4888', '1761', '5362', '3839', '4825', '5042', '3116', '29320789', '4192', '2911', '4109', '4627', '4288', '3679', '4813', '4905', '5318', '1731', '1974', '3763', '5200', '5278', '4572', '2980', '4343', '3987', '5275', '4844', '3726', '3817', '29321036', '4752', '5073', '5219', '29320839', '3641', '4370', '5371', '4059', '4965', '3920', '4812', '5062', '3850', '1684', '5937', '1740', '29320366', '29320802', '4334', '4307', '29321002', '5157', '4019', '2874', '3944', '4231', '5004', '5338', '4728', '4255', '3931', '4646', '5016', '5262', '1097', '4185', '4577', '4277', '29320936', '4708', '3917', '4293', '3885', '3774', '3849', '4258', '3877', '4995', '5394', '3929', '4679', '29320976', '4878', '5005', '5006', '5123', '4871', '4550', '3939', '4928', '4930', '5096', '5099', '3990', '4764', '4568', '4580', '4064', '29321069', '5938', '4952', '5228', '6031', '4471', '4460', '4121', '3956', '29320902', '5373', '5301', '29320879', '4432', '4030', '5397', '3983', '29320474', '5249', '3747', '4423', '4259', '4630', '3979', '4524', '4609', '4629', '29320834', '3744', '6043', '29321012', '5369', '4949', '5346', '29320991', '3010', '4618', '4835', '5355', '4617', '4441', '2859', '4106', '4009', '29321301', '4276', '4137', '29320841', '5941', '5002', '4397', '4663', '4103', '4940', '3852', '1296', '2870', '4593', '4014', '3755', '4565', '4372', '5174', '5245', '29320941', '3973', '3800', '29320858', '3612', '5381', '4753', '4082') AND  `franchise_id` != ''");
while($brand = $brands->fetch_object()) {// print_r($brand);// exit;
                //  $email              = $brand->email;
                  $bid                = $brand->id;
				//echo "SELECT franchisor_business_details.fran_detail_id FROM user_accounts INNER JOIN franchisor_business_details ON user_accounts.profile_str = franchisor_business_details.franchisor_id WHERE user_accounts.email = '$email'";
    $fquery = $pdo2->query("SELECT fran_detail_id FROM franchisor_business_details WHERE franchisor_id = '$brand->franchise_id'");
   // $fquery = $pdo2->query("SELECT fran_detail_id FROM franchisor_business_details WHERE fran_detail_id = 70");

   // $fquery = $pdo2->query("SELECT brandId FROM forms WHERE form_id = 1");
    $fdata          = $fquery->fetch_object();
	//echo "aa";
	//print_r($fdata); exit;
	
   $fbid    = $fdata->fran_detail_id;
	if($bid != ""){
		$uquery = $pdo2->query("UPDATE brands SET new_brand_id = '$fbid' WHERE id = '$bid'");
		echo "UPDATE brands SET new_brand_id = '$fbid' WHERE brand_id = '$bid'<br>";
	}

}
*/
?>
