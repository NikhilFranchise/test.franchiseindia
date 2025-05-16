<?php
$pdo1 = new mysqli("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchise_dealer_db");
if ($pdo1->connect_error) {
    die("Connection failed: " . $pdo1->connect_error);
}
echo "Connected opi successfully and \n";
$pdo2 = new mysqli("localhost", "root", '$Z|d!$1:Dvsl>8E9n;c!', "franchis_franchisnewcopy");
if ($pdo2->connect_error) {
    die("Connection failed: " . $pdo2->connect_error);
}
echo "Connected  franchis_franchisnewcopy_cleaned successfully \n";
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
        ["di" =>349, "fi" =>"1168"],
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
        if ($subcate['di'] == $di) {
            return $subcate['fi']; // Return the name of the state
        }
    }   
}

$count = 0;

//$buyers = $pdo1->query("SELECT users.*, investor_details.* FROM users LEFT JOIN investor_details ON users.id = investor_details.user_id WHERE users.user_type = 'buyer'  and users.is_verified = 1 and users.id IN ('232986', '236157', '239108', '245643', '249357', '251970', '232834', '278471', '290283', '292346', '293067', '295675', '306067', '309255', '304900', '312986')");

$buyers = $pdo1->query("SELECT users.email, users.password, users.mobile, users.name, users.created_at, users.updated_at, inv.inv_address,inv.inv_country, inv.inv_city, inv.inv_pincode,inv.secondary_email,inv.secondary_phone_no,inv.landmark,inv.service_type,inv.service_company_name,inv.business_company_name,inv.franchising_brand_name,inv.looking_for,inv.state_looking_business,inv.city_looking_business,inv.occupation,inv.dob,inv.edu_qualification,inv.income_range,inv.avail_capital,inv.avlcap_min,inv.avlcap_max,inv.fran_ind_int,inv.inv_amt,inv.investment_min,inv.investment_max,inv.investment_time,inv.loan_required,inv.is_prop_commercial,inv.prop_address,inv.area_req_min,inv.area_req_max,inv.area_type,inv.property_type,inv.is_parking_available,inv.is_current_business,inv.industry_business,inv.no_of_years_business,inv.no_of_employees,inv.franchise_experience,inv.business_desc,inv.is_job_experience,inv.industry_job,inv.no_of_years_exp,inv.other_industry,inv.master_franchise_invest,inv.source_type,inv.membership_type,inv.total_credits,inv.credit_limit,inv.membership_plan FROM users LEFT JOIN investor_details as inv ON users.id = inv.user_id WHERE users.user_type = 'buyer' and users.is_verified = 1 LIMIT 19200, 500");

while ($buyer = $buyers->fetch_object()) { //print_r($buyer); exit;

    $citydata = $pdo1->query("SELECT * FROM cities WHERE id = '$buyer->inv_city'");
    $city       = $citydata->fetch_object();
    $cityName   = $city->city_name;
    $stateName  = _getstate($city->state_id);

    // $categorydata = $pdo1->query("SELECT * FROM investor_industries WHERE investor_id = '$buyer->id'");
    // $category     = $categorydata->fetch_all();
    
    // $industry_cats = [];
    // foreach($category as $invCatData) {
    //    $industry_cats[] = _getIndCat($invCatData[2]);
    // } 
    
    
    $email              = $buyer->email;
    $password           = password_hash($buyer->mobile, PASSWORD_DEFAULT);
    $mobile             = $buyer->mobile;
    $name               = $pdo2->real_escape_string($buyer->name);
    $membership_type    = "";
    $membership_plan    = "";
    $profile_status     = 1;
    $profile_type       = 2;
    $data_source        = "di";
    $created_at         = $buyer->created_at;
    $updated_at         = $buyer->updated_at;

    $inv_address                = $pdo2->real_escape_string($buyer->inv_address);
    $inv_country                = $buyer->inv_country;
    $inv_state                  = $stateName;
    $inv_city                   = $cityName;
    $inv_pincode                = $buyer->inv_pincode;
    $secondary_email            = $buyer->secondary_email;
    $secondary_phone_no         = $buyer->secondary_phone_no;
    $landmark                   = $pdo2->real_escape_string($buyer->landmark);
    $service_type               = $buyer->service_type;
    $service_company_name       = $pdo2->real_escape_string($buyer->service_company_name);
    $business_company_name      = $pdo2->real_escape_string($buyer->business_company_name);
    $franchising_brand_name     = $pdo2->real_escape_string($buyer->franchising_brand_name);
    $looking_for                = $pdo2->real_escape_string($buyer->looking_for);
    $state_looking_business     = $pdo2->real_escape_string($buyer->state_looking_business);
    $city_looking_business      = $pdo2->real_escape_string($buyer->city_looking_business);
    $occupation                 = $pdo2->real_escape_string($buyer->occupation);
    $dob                        = $pdo2->real_escape_string($buyer->dob);
    $edu_qualification          = $pdo2->real_escape_string($buyer->edu_qualification);
    $income_range               = $buyer->income_range;
    $avail_capital              = $pdo2->real_escape_string($buyer->avail_capital);
    $avlcap_min                 = $buyer->avlcap_min;
    $avlcap_max                 = $buyer->avlcap_max;
    $fran_ind_int               = $buyer->fran_ind_int;
    $inv_amt                    = $buyer->inv_amt;
    $investment_min             = $buyer->investment_min;
    $investment_max             = $buyer->investment_max;
    $investment_time            = $buyer->investment_time;
    $loan_required              = $pdo2->real_escape_string($buyer->loan_required);
    $is_prop_commercial         = $pdo2->real_escape_string($buyer->is_prop_commercial);
    $prop_address               = $pdo2->real_escape_string($buyer->prop_address);
    $area_req_min               = $buyer->area_req_min;
    $area_req_max               = $buyer->area_req_max;
    $area_type                  = $pdo2->real_escape_string($buyer->area_type);
    $property_type              = $pdo2->real_escape_string($buyer->property_type);
    $is_parking_available       = $pdo2->real_escape_string($buyer->is_parking_available);
    $is_current_business        = $pdo2->real_escape_string($buyer->is_current_business);
    $industry_business          = $pdo2->real_escape_string($buyer->industry_business);
    $no_of_years_business       = $pdo2->real_escape_string($buyer->no_of_years_business);
    $no_of_employees            = $pdo2->real_escape_string($buyer->no_of_employees);
    $franchise_experience       = $pdo2->real_escape_string($buyer->franchise_experience);
    $business_desc              = $pdo2->real_escape_string($buyer->business_desc);
    $is_job_experience          = $pdo2->real_escape_string($buyer->is_job_experience);
    $industry_job               = $pdo2->real_escape_string($buyer->industry_job);
    $no_of_years_exp            = $pdo2->real_escape_string($buyer->no_of_years_exp);
    $other_industry             = $pdo2->real_escape_string($buyer->other_industry);
    $master_franchise_invest    = $pdo2->real_escape_string($buyer->master_franchise_invest);
    $source_type                = $pdo2->real_escape_string($buyer->source_type);
    $membership_type            = $pdo2->real_escape_string($buyer->membership_type);
    $total_credits              = $buyer->total_credits;
    $credit_limit               = $buyer->credit_limit;
    $membership_plan            = $buyer->membership_plan;



$newFranchiseId = 'FIHL' . str_pad(rand(0, 999999), 7, '0', STR_PAD_LEFT);
$stmt = $pdo2->query("SELECT COUNT(*) AS count FROM user_accounts WHERE email = '$email'");
$yy = $stmt->fetch_object();
if ($yy->count == 0) {
    do {    
        $newFranchiseId = 'FIHL' . str_pad(rand(0, 999999), 7, '0', STR_PAD_LEFT);
        // Check if the generated ID already exists in franchisor_business_details
        $checkQuery = $pdo2->query("SELECT profile_str FROM user_accounts WHERE profile_str = '$newFranchiseId'");
        $fid = $checkQuery->fetch_object();
    } while ($fid->profile_str > 0); // Repeat until a unique ID is generated
    echo "Generated new franchise_id: $newFranchiseId<br>";
    $insert_stmt = $pdo2->query("INSERT INTO user_accounts (email,password,mobile,name,membership_type,membership_plan,profile_type,profile_status,profile_str,data_source,created_at,updated_at) VALUES ('$email', '$password', '$mobile', '$name', '$membership_type', '$membership_plan', '$profile_type','$profile_status','$newFranchiseId','$data_source','$created_at','$updated_at')");
    $insert_stmt1 = $pdo2->query("INSERT INTO investor_details (investor_id,inv_address,inv_country,inv_state,inv_city,inv_pincode,secondary_email,secondary_phone_no,landmark,service_type,service_company_name,business_company_name,franchising_brand_name,looking_for,state_looking_business,city_looking_business,occupation,dob,edu_qualification,income_range,avail_capital,avlcap_min,avlcap_max,fran_ind_int,inv_amt,investment_min,investment_max,investment_time,loan_required,is_prop_commercial,prop_address,area_req_min,area_req_max,area_type,property_type,is_parking_available,is_current_business,industry_business,no_of_years_business,no_of_employees,franchise_experience,business_desc,is_job_experience,industry_job,no_of_years_exp,other_industry,master_franchise_invest,source_type,membership_type,total_credits,credit_limit,membership_plan,created_at,updated_at)
         VALUES ('$newFranchiseId','$inv_address','$inv_country','$inv_state','$inv_city','$inv_pincode','$secondary_email','$secondary_phone_no','$landmark','$service_type','$service_company_name','$business_company_name','$franchising_brand_name','$looking_for','$state_looking_business','$city_looking_business','$occupation','$dob','$edu_qualification','$income_range','$avail_capital','$avlcap_min','$avlcap_max','$fran_ind_int','$inv_amt','$investment_min','$investment_max','$investment_time','$loan_required','$is_prop_commercial','$prop_address','$area_req_min','$area_req_max','$area_type','$property_type','$is_parking_available','$is_current_business','$industry_business','$no_of_years_business','$no_of_employees','$franchise_experience','$business_desc','$is_job_experience','$industry_job','$no_of_years_exp','$other_industry','$master_franchise_invest','$source_type','$membership_type','$total_credits','$credit_limit','$membership_plan','$created_at','$updated_at')");
    
    $insert_stmt2 = $pdo2->query("INSERT INTO investor_industries (investor_id,ind_main_cat) VALUES ('$newFranchiseId', '5')");
    $count++;
}
$stmt->free();

}
$pdo1->close();
$pdo2->close();
?>
