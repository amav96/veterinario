<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $distritos =[
            ['1','CHACHAPOYAS'],
['1','ASUNCION'],
['1','BALSAS'],
['1','CHETO'],
['1','CHILIQUIN'],
['1','CHUQUIBAMBA'],
['1','GRANADA'],
['1','HUANCAS'],
['1','LA JALCA'],
['1','LEIMEBAMBA'],
['1','LEVANTO'],
['1','MAGDALENA'],
['1','MARISCAL CASTILLA'],
['1','MOLINOPAMPA'],
['1','MONTEVIDEO'],
['1','OLLEROS'],
['1','QUINJALCA'],
['1','SAN FRANCISCO DE DAGUAS'],
['1','SAN ISIDRO DE MAINO'],
['1','SOLOCO'],
['1','SONCHE'],
['2','BAGUA'],
['2','ARAMANGO'],
['2','COPALLIN'],
['2','EL PARCO'],
['2','IMAZA'],
['2','LA PECA'],
['3','JUMBILLA'],
['3','CHISQUILLA'],
['3','CHURUJA'],
['3','COROSHA'],
['3','CUISPES'],
['3','FLORIDA'],
['3','JAZAN'],
['3','RECTA'],
['3','SAN CARLOS'],
['3','SHIPASBAMBA'],
['3','VALERA'],
['3','YAMBRASBAMBA'],
['4','NIEVA'],
['4','EL CENEPA'],
['4','RIO SANTIAGO'],
['5','LAMUD'],
['5','CAMPORREDONDO'],
['5','COCABAMBA'],
['5','COLCAMAR'],
['5','CONILA'],
['5','INGUILPATA'],
['5','LONGUITA'],
['5','LONYA CHICO'],
['5','LUYA'],
['5','LUYA VIEJO'],
['5','MARIA'],
['5','OCALLI'],
['5','OCUMAL'],
['5','PISUQUIA'],
['5','PROVIDENCIA'],
['5','SAN CRISTOBAL'],
['5','SAN FRANCISCO DEL YESO'],
['5','SAN JERONIMO'],
['5','SAN JUAN DE LOPECANCHA'],
['5','SANTA CATALINA'],
['5','SANTO TOMAS'],
['5','TINGO'],
['5','TRITA'],
['6','SAN NICOLAS'],
['6','CHIRIMOTO'],
['6','COCHAMAL'],
['6','HUAMBO'],
['6','LIMABAMBA'],
['6','LONGAR'],
['6','MARISCAL BENAVIDES'],
['6','MILPUC'],
['6','OMIA'],
['6','SANTA ROSA'],
['6','TOTORA'],
['6','VISTA ALEGRE'],
['7','BAGUA GRANDE'],
['7','CAJARURO'],
['7','CUMBA'],
['7','EL MILAGRO'],
['7','JAMALCA'],
['7','LONYA GRANDE'],
['7','YAMON'],
['8','HUARAZ'],
['8','COCHABAMBA'],
['8','COLCABAMBA'],
['8','HUANCHAY'],
['8','INDEPENDENCIA'],
['8','JANGAS'],
['8','LA LIBERTAD'],
['8','OLLEROS'],
['8','PAMPAS GRANDE'],
['8','PARIACOTO'],
['8','PIRA'],
['8','TARICA'],
['9','AIJA'],
['9','CORIS'],
['9','HUACLLAN'],
['9','LA MERCED'],
['9','SUCCHA'],
['10','LLAMELLIN'],
['10','ACZO'],
['10','CHACCHO'],
['10','CHINGAS'],
['10','MIRGAS'],
['10','SAN JUAN DE RONTOY'],
['11','CHACAS'],
['11','ACOCHACA'],
['12','CHIQUIAN'],
['12','ABELARDO PARDO LEZAMETA'],
['12','ANTONIO RAYMONDI'],
['12','AQUIA'],
['12','CAJACAY'],
['12','CANIS'],
['12','COLQUIOC'],
['12','HUALLANCA'],
['12','HUASTA'],
['12','HUAYLLACAYAN'],
['12','LA PRIMAVERA'],
['12','MANGAS'],
['12','PACLLON'],
['12','SAN MIGUEL DE CORPANQUI'],
['12','TICLLOS'],
['13','CARHUAZ'],
['13','ACOPAMPA'],
['13','AMASHCA'],
['13','ANTA'],
['13','ATAQUERO'],
['13','MARCARA'],
['13','PARIAHUANCA'],
['13','SAN MIGUEL DE ACO'],
['13','SHILLA'],
['13','TINCO'],
['13','YUNGAR'],
['14','SAN LUIS'],
['14','SAN NICOLAS'],
['14','YAUYA'],
['15','CASMA'],
['15','BUENA VISTA ALTA'],
['15','COMANDANTE NOEL'],
['15','YAUTAN'],
['16','CORONGO'],
['16','ACO'],
['16','BAMBAS'],
['16','CUSCA'],
['16','LA PAMPA'],
['16','YANAC'],
['16','YUPAN'],
['17','HUARI'],
['17','ANRA'],
['17','CAJAY'],
['17','CHAVIN DE HUANTAR'],
['17','HUACACHI'],
['17','HUACCHIS'],
['17','HUACHIS'],
['17','HUANTAR'],
['17','MASIN'],
['17','PAUCAS'],
['17','PONTO'],
['17','RAHUAPAMPA'],
['17','RAPAYAN'],
['17','SAN MARCOS'],
['17','SAN PEDRO DE CHANA'],
['17','UCO'],
['18','HUARMEY'],
['18','COCHAPETI'],
['18','CULEBRAS'],
['18','HUAYAN'],
['18','MALVAS'],
['19','CARAZ'],
['19','HUALLANCA'],
['19','HUATA'],
['19','HUAYLAS'],
['19','MATO'],
['19','PAMPAROMAS'],
['19','PUEBLO LIBRE'],
['19','SANTA CRUZ'],
['19','SANTO TORIBIO'],
['19','YURACMARCA'],
['20','PISCOBAMBA'],
['20','CASCA'],
['20','ELEAZAR GUZMAN BARRON'],
['20','FIDEL OLIVAS ESCUDERO'],
['20','LLAMA'],
['20','LLUMPA'],
['20','LUCMA'],
['20','MUSGA'],
['21','OCROS'],
['21','ACAS'],
['21','CAJAMARQUILLA'],
['21','CARHUAPAMPA'],
['21','COCHAS'],
['21','CONGAS'],
['21','LLIPA'],
['21','SAN CRISTOBAL DE RAJAN'],
['21','SAN PEDRO'],
['21','SANTIAGO DE CHILCAS'],
['22','CABANA'],
['22','BOLOGNESI'],
['22','CONCHUCOS'],
['22','HUACASCHUQUE'],
['22','HUANDOVAL'],
['22','LACABAMBA'],
['22','LLAPO'],
['22','PALLASCA'],
['22','PAMPAS'],
['22','SANTA ROSA'],
['22','TAUCA'],
['23','POMABAMBA'],
['23','HUAYLLAN'],
['23','PAROBAMBA'],
['23','QUINUABAMBA'],
['24','RECUAY'],
['24','CATAC'],
['24','COTAPARACO'],
['24','HUAYLLAPAMPA'],
['24','LLACLLIN'],
['24','MARCA'],
['24','PAMPAS CHICO'],
['24','PARARIN'],
['24','TAPACOCHA'],
['24','TICAPAMPA'],
['25','CHIMBOTE'],
['25','CACERES DEL PERU'],
['25','COISHCO'],
['25','MACATE'],
['25','MORO'],
['25','NEPEÑA'],
['25','SAMANCO'],
['25','SANTA'],
['25','NUEVO CHIMBOTE'],
['26','SIHUAS'],
['26','ACOBAMBA'],
['26','ALFONSO UGARTE'],
['26','CASHAPAMPA'],
['26','CHINGALPO'],
['26','HUAYLLABAMBA'],
['26','QUICHES'],
['26','RAGASH'],
['26','SAN JUAN'],
['26','SICSIBAMBA'],
['27','YUNGAY'],
['27','CASCAPARA'],
['27','MANCOS'],
['27','MATACOTO'],
['27','QUILLO'],
['27','RANRAHIRCA'],
['27','SHUPLUY'],
['27','YANAMA'],
['28','ABANCAY'],
['28','CHACOCHE'],
['28','CIRCA'],
['28','CURAHUASI'],
['28','HUANIPACA'],
['28','LAMBRAMA'],
['28','PICHIRHUA'],
['28','SAN PEDRO DE CACHORA'],
['28','TAMBURCO'],
['29','ANDAHUAYLAS'],
['29','ANDARAPA'],
['29','CHIARA'],
['29','HUANCARAMA'],
['29','HUANCARAY'],
['29','HUAYANA'],
['29','KISHUARA'],
['29','PACOBAMBA'],
['29','PACUCHA'],
['29','PAMPACHIRI'],
['29','POMACOCHA'],
['29','SAN ANTONIO DE CACHI'],
['29','SAN JERONIMO'],
['29','SAN MIGUEL DE CHACCRAMPA'],
['29','SANTA MARIA DE CHICMO'],
['29','TALAVERA'],
['29','TUMAY HUARACA'],
['29','TURPO'],
['29','KAQUIABAMBA'],
['29','JOSE MARIA ARGUEDAS'],
['30','ANTABAMBA'],
['30','EL ORO'],
['30','HUAQUIRCA'],
['30','JUAN ESPINOZA MEDRANO'],
['30','OROPESA'],
['30','PACHACONAS'],
['30','SABAINO'],
['31','CHALHUANCA'],
['31','CAPAYA'],
['31','CARAYBAMBA'],
['31','CHAPIMARCA'],
['31','COLCABAMBA'],
['31','COTARUSE'],
['31','HUAYLLO'],
['31','JUSTO APU SAHUARAURA'],
['31','LUCRE'],
['31','POCOHUANCA'],
['31','SAN JUAN DE CHACÑA'],
['31','SAÑAYCA'],
['31','SORAYA'],
['31','TAPAIRIHUA'],
['31','TINTAY'],
['31','TORAYA'],
['31','YANACA'],
['32','TAMBOBAMBA'],
['32','COTABAMBAS'],
['32','COYLLURQUI'],
['32','HAQUIRA'],
['32','MARA'],
['32','CHALLHUAHUACHO'],
['33','CHINCHEROS'],
['33','ANCO_HUALLO'],
['33','COCHARCAS'],
['33','HUACCANA'],
['33','OCOBAMBA'],
['33','ONGOY'],
['33','URANMARCA'],
['33','RANRACANCHA'],
['33','ROCCHACC'],
['33','EL PORVENIR'],
['33','LOS CHANKAS'],
['34','CHUQUIBAMBILLA'],
['34','CURPAHUASI'],
['34','GAMARRA'],
['34','HUAYLLATI'],
['34','MAMARA'],
['34','MICAELA BASTIDAS'],
['34','PATAYPAMPA'],
['34','PROGRESO'],
['34','SAN ANTONIO'],
['34','SANTA ROSA'],
['34','TURPAY'],
['34','VILCABAMBA'],
['34','VIRUNDO'],
['34','CURASCO'],
['35','AREQUIPA'],
['35','ALTO SELVA ALEGRE'],
['35','CAYMA'],
['35','CERRO COLORADO'],
['35','CHARACATO'],
['35','CHIGUATA'],
['35','JACOBO HUNTER'],
['35','LA JOYA'],
['35','MARIANO MELGAR'],
['35','MIRAFLORES'],
['35','MOLLEBAYA'],
['35','PAUCARPATA'],
['35','POCSI'],
['35','POLOBAYA'],
['35','QUEQUEÑA'],
['35','SABANDIA'],
['35','SACHACA'],
['35','SAN JUAN DE SIGUAS'],
['35','SAN JUAN DE TARUCANI'],
['35','SANTA ISABEL DE SIGUAS'],
['35','SANTA RITA DE SIGUAS'],
['35','SOCABAYA'],
['35','TIABAYA'],
['35','UCHUMAYO'],
['35','VITOR'],
['35','YANAHUARA'],
['35','YARABAMBA'],
['35','YURA'],
['35','JOSE LUIS BUSTAMANTE Y RIVERO'],
['36','CAMANA'],
['36','JOSE MARIA QUIMPER'],
['36','MARIANO NICOLAS VALCARCEL'],
['36','MARISCAL CACERES'],
['36','NICOLAS DE PIEROLA'],
['36','OCOÑA'],
['36','QUILCA'],
['36','SAMUEL PASTOR'],
['37','CARAVELI'],
['37','ACARI'],
['37','ATICO'],
['37','ATIQUIPA'],
['37','BELLA UNION'],
['37','CAHUACHO'],
['37','CHALA'],
['37','CHAPARRA'],
['37','HUANUHUANU'],
['37','JAQUI'],
['37','LOMAS'],
['37','QUICACHA'],
['37','YAUCA'],
['38','APLAO'],
['38','ANDAGUA'],
['38','AYO'],
['38','CHACHAS'],
['38','CHILCAYMARCA'],
['38','CHOCO'],
['38','HUANCARQUI'],
['38','MACHAGUAY'],
['38','ORCOPAMPA'],
['38','PAMPACOLCA'],
['38','TIPAN'],
['38','UÑON'],
['38','URACA'],
['38','VIRACO'],
['39','CHIVAY'],
['39','ACHOMA'],
['39','CABANACONDE'],
['39','CALLALLI'],
['39','CAYLLOMA'],
['39','COPORAQUE'],
['39','HUAMBO'],
['39','HUANCA'],
['39','ICHUPAMPA'],
['39','LARI'],
['39','LLUTA'],
['39','MACA'],
['39','MADRIGAL'],
['39','SAN ANTONIO DE CHUCA'],
['39','SIBAYO'],
['39','TAPAY'],
['39','TISCO'],
['39','TUTI'],
['39','YANQUE'],
['39','MAJES'],
['40','CHUQUIBAMBA'],
['40','ANDARAY'],
['40','CAYARANI'],
['40','CHICHAS'],
['40','IRAY'],
['40','RIO GRANDE'],
['40','SALAMANCA'],
['40','YANAQUIHUA'],
['41','MOLLENDO'],
['41','COCACHACRA'],
['41','DEAN VALDIVIA'],
['41','ISLAY'],
['41','MEJIA'],
['41','PUNTA DE BOMBON'],
['42','COTAHUASI'],
['42','ALCA'],
['42','CHARCANA'],
['42','HUAYNACOTAS'],
['42','PAMPAMARCA'],
['42','PUYCA'],
['42','QUECHUALLA'],
['42','SAYLA'],
['42','TAURIA'],
['42','TOMEPAMPA'],
['42','TORO'],
['43','AYACUCHO'],
['43','ACOCRO'],
['43','ACOS VINCHOS'],
['43','CARMEN ALTO'],
['43','CHIARA'],
['43','OCROS'],
['43','PACAYCASA'],
['43','QUINUA'],
['43','SAN JOSE DE TICLLAS'],
['43','SAN JUAN BAUTISTA'],
['43','SANTIAGO DE PISCHA'],
['43','SOCOS'],
['43','TAMBILLO'],
['43','VINCHOS'],
['43','JESUS NAZARENO'],
['43','ANDRES AVELINO CACERES DORREGARAY'],
['44','CANGALLO'],
['44','CHUSCHI'],
['44','LOS MOROCHUCOS'],
['44','MARIA PARADO DE BELLIDO'],
['44','PARAS'],
['44','TOTOS'],
['45','SANCOS'],
['45','CARAPO'],
['45','SACSAMARCA'],
['45','SANTIAGO DE LUCANAMARCA'],
['46','HUANTA'],
['46','AYAHUANCO'],
['46','HUAMANGUILLA'],
['46','IGUAIN'],
['46','LURICOCHA'],
['46','SANTILLANA'],
['46','SIVIA'],
['46','LLOCHEGUA'],
['46','CANAYRE'],
['46','UCHURACCAY'],
['46','PUCACOLPA'],
['46','CHACA'],
['47','SAN MIGUEL'],
['47','ANCO'],
['47','AYNA'],
['47','CHILCAS'],
['47','CHUNGUI'],
['47','LUIS CARRANZA'],
['47','SANTA ROSA'],
['47','TAMBO'],
['47','SAMUGARI'],
['47','ANCHIHUAY'],
['47','ORONCCOY'],
['48','PUQUIO'],
['48','AUCARA'],
['48','CABANA'],
['48','CARMEN SALCEDO'],
['48','CHAVIÑA'],
['48','CHIPAO'],
['48','HUAC-HUAS'],
['48','LARAMATE'],
['48','LEONCIO PRADO'],
['48','LLAUTA'],
['48','LUCANAS'],
['48','OCAÑA'],
['48','OTOCA'],
['48','SAISA'],
['48','SAN CRISTOBAL'],
['48','SAN JUAN'],
['48','SAN PEDRO'],
['48','SAN PEDRO DE PALCO'],
['48','SANCOS'],
['48','SANTA ANA DE HUAYCAHUACHO'],
['48','SANTA LUCIA'],
['49','CORACORA'],
['49','CHUMPI'],
['49','CORONEL CASTAÑEDA'],
['49','PACAPAUSA'],
['49','PULLO'],
['49','PUYUSCA'],
['49','SAN FRANCISCO DE RAVACAYCO'],
['49','UPAHUACHO'],
['50','PAUSA'],
['50','COLTA'],
['50','CORCULLA'],
['50','LAMPA'],
['50','MARCABAMBA'],
['50','OYOLO'],
['50','PARARCA'],
['50','SAN JAVIER DE ALPABAMBA'],
['50','SAN JOSE DE USHUA'],
['50','SARA SARA'],
['51','QUEROBAMBA'],
['51','BELEN'],
['51','CHALCOS'],
['51','CHILCAYOC'],
['51','HUACAÑA'],
['51','MORCOLLA'],
['51','PAICO'],
['51','SAN PEDRO DE LARCAY'],
['51','SAN SALVADOR DE QUIJE'],
['51','SANTIAGO DE PAUCARAY'],
['51','SORAS'],
['52','HUANCAPI'],
['52','ALCAMENCA'],
['52','APONGO'],
['52','ASQUIPATA'],
['52','CANARIA'],
['52','CAYARA'],
['52','COLCA'],
['52','HUAMANQUIQUIA'],
['52','HUANCARAYLLA'],
['52','HUAYA'],
['52','SARHUA'],
['52','VILCANCHOS'],
['53','VILCAS HUAMAN'],
['53','ACCOMARCA'],
['53','CARHUANCA'],
['53','CONCEPCION'],
['53','HUAMBALPA'],
['53','INDEPENDENCIA'],
['53','SAURAMA'],
['53','VISCHONGO'],
['54','CAJAMARCA'],
['54','ASUNCION'],
['54','CHETILLA'],
['54','COSPAN'],
['54','ENCAÑADA'],
['54','JESUS'],
['54','LLACANORA'],
['54','LOS BAÑOS DEL INCA'],
['54','MAGDALENA'],
['54','MATARA'],
['54','NAMORA'],
['54','SAN JUAN'],
['55','CAJABAMBA'],
['55','CACHACHI'],
['55','CONDEBAMBA'],
['55','SITACOCHA'],
['56','CELENDIN'],
['56','CHUMUCH'],
['56','CORTEGANA'],
['56','HUASMIN'],
['56','JORGE CHAVEZ'],
['56','JOSE GALVEZ'],
['56','MIGUEL IGLESIAS'],
['56','OXAMARCA'],
['56','SOROCHUCO'],
['56','SUCRE'],
['56','UTCO'],
['56','LA LIBERTAD DE PALLAN'],
['57','CHOTA'],
['57','ANGUIA'],
['57','CHADIN'],
['57','CHIGUIRIP'],
['57','CHIMBAN'],
['57','CHOROPAMPA'],
['57','COCHABAMBA'],
['57','CONCHAN'],
['57','HUAMBOS'],
['57','LAJAS'],
['57','LLAMA'],
['57','MIRACOSTA'],
['57','PACCHA'],
['57','PION'],
['57','QUEROCOTO'],
['57','SAN JUAN DE LICUPIS'],
['57','TACABAMBA'],
['57','TOCMOCHE'],
['57','CHALAMARCA'],
['58','CONTUMAZA'],
['58','CHILETE'],
['58','CUPISNIQUE'],
['58','GUZMANGO'],
['58','SAN BENITO'],
['58','SANTA CRUZ DE TOLED'],
['58','TANTARICA'],
['58','YONAN'],
['59','CUTERVO'],
['59','CALLAYUC'],
['59','CHOROS'],
['59','CUJILLO'],
['59','LA RAMADA'],
['59','PIMPINGOS'],
['59','QUEROCOTILLO'],
['59','SAN ANDRES DE CUTERVO'],
['59','SAN JUAN DE CUTERVO'],
['59','SAN LUIS DE LUCMA'],
['59','SANTA CRUZ'],
['59','SANTO DOMINGO DE LA CAPILLA'],
['59','SANTO TOMAS'],
['59','SOCOTA'],
['59','TORIBIO CASANOVA'],
['60','BAMBAMARCA'],
['60','CHUGUR'],
['60','HUALGAYOC'],
['61','JAEN'],
['61','BELLAVISTA'],
['61','CHONTALI'],
['61','COLASAY'],
['61','HUABAL'],
['61','LAS PIRIAS'],
['61','POMAHUACA'],
['61','PUCARA'],
['61','SALLIQUE'],
['61','SAN FELIPE'],
['61','SAN JOSE DEL ALTO'],
['61','SANTA ROSA'],
['62','SAN IGNACIO'],
['62','CHIRINOS'],
['62','HUARANGO'],
['62','LA COIPA'],
['62','NAMBALLE'],
['62','SAN JOSE DE LOURDES'],
['62','TABACONAS'],
['63','PEDRO GALVEZ'],
['63','CHANCAY'],
['63','EDUARDO VILLANUEVA'],
['63','GREGORIO PITA'],
['63','ICHOCAN'],
['63','JOSE MANUEL QUIROZ'],
['63','JOSE SABOGAL'],
['64','SAN MIGUEL'],
['64','BOLIVAR'],
['64','CALQUIS'],
['64','CATILLUC'],
['64','EL PRADO'],
['64','LA FLORIDA'],
['64','LLAPA'],
['64','NANCHOC'],
['64','NIEPOS'],
['64','SAN GREGORIO'],
['64','SAN SILVESTRE DE COCHAN'],
['64','TONGOD'],
['64','UNION AGUA BLANCA'],
['65','SAN PABLO'],
['65','SAN BERNARDINO'],
['65','SAN LUIS'],
['65','TUMBADEN'],
['66','SANTA CRUZ'],
['66','ANDABAMBA'],
['66','CATACHE'],
['66','CHANCAYBAÑOS'],
['66','LA ESPERANZA'],
['66','NINABAMBA'],
['66','PULAN'],
['66','SAUCEPAMPA'],
['66','SEXI'],
['66','UTICYACU'],
['66','YAUYUCAN'],
['67','CALLAO'],
['67','BELLAVISTA'],
['67','CARMEN DE LA LEGUA REYNOSO'],
['67','LA PERLA'],
['67','LA PUNTA'],
['67','VENTANILLA'],
['67','MI PERU'],
['68','CUSCO'],
['68','CCORCA'],
['68','POROY'],
['68','SAN JERONIMO'],
['68','SAN SEBASTIAN'],
['68','SANTIAGO'],
['68','SAYLLA'],
['68','WANCHAQ'],
['69','ACOMAYO'],
['69','ACOPIA'],
['69','ACOS'],
['69','MOSOC LLACTA'],
['69','POMACANCHI'],
['69','RONDOCAN'],
['69','SANGARARA'],
['70','ANTA'],
['70','ANCAHUASI'],
['70','CACHIMAYO'],
['70','CHINCHAYPUJIO'],
['70','HUAROCONDO'],
['70','LIMATAMBO'],
['70','MOLLEPATA'],
['70','PUCYURA'],
['70','ZURITE'],
['71','CALCA'],
['71','COYA'],
['71','LAMAY'],
['71','LARES'],
['71','PISAC'],
['71','SAN SALVADOR'],
['71','TARAY'],
['71','YANATILE'],
['72','YANAOCA'],
['72','CHECCA'],
['72','KUNTURKANKI'],
['72','LANGUI'],
['72','LAYO'],
['72','PAMPAMARCA'],
['72','QUEHUE'],
['72','TUPAC AMARU'],
['73','SICUANI'],
['73','CHECACUPE'],
['73','COMBAPATA'],
['73','MARANGANI'],
['73','PITUMARCA'],
['73','SAN PABLO'],
['73','SAN PEDRO'],
['73','TINTA'],
['74','SANTO TOMAS'],
['74','CAPACMARCA'],
['74','CHAMACA'],
['74','COLQUEMARCA'],
['74','LIVITACA'],
['74','LLUSCO'],
['74','QUIÑOTA'],
['74','VELILLE'],
['75','ESPINAR'],
['75','CONDOROMA'],
['75','COPORAQUE'],
['75','OCORURO'],
['75','PALLPATA'],
['75','PICHIGUA'],
['75','SUYCKUTAMBO'],
['75','ALTO PICHIGUA'],
['76','SANTA ANA'],
['76','ECHARATE'],
['76','HUAYOPATA'],
['76','MARANURA'],
['76','OCOBAMBA'],
['76','QUELLOUNO'],
['76','KIMBIRI'],
['76','SANTA TERESA'],
['76','VILCABAMBA'],
['76','PICHARI'],
['76','INKAWASI'],
['76','VILLA VIRGEN'],
['76','VILLA KINTIARINA'],
['76','MEGANTONI'],
['77','PARURO'],
['77','ACCHA'],
['77','CCAPI'],
['77','COLCHA'],
['77','HUANOQUITE'],
['77','OMACHA'],
['77','PACCARITAMBO'],
['77','PILLPINTO'],
['77','YAURISQUE'],
['78','PAUCARTAMBO'],
['78','CAICAY'],
['78','CHALLABAMBA'],
['78','COLQUEPATA'],
['78','HUANCARANI'],
['78','KOSÑIPATA'],
['79','URCOS'],
['79','ANDAHUAYLILLAS'],
['79','CAMANTI'],
['79','CCARHUAYO'],
['79','CCATCA'],
['79','CUSIPATA'],
['79','HUARO'],
['79','LUCRE'],
['79','MARCAPATA'],
['79','OCONGATE'],
['79','OROPESA'],
['79','QUIQUIJANA'],
['80','URUBAMBA'],
['80','CHINCHERO'],
['80','HUAYLLABAMBA'],
['80','MACHUPICCHU'],
['80','MARAS'],
['80','OLLANTAYTAMBO'],
['80','YUCAY'],
['81','HUANCAVELICA'],
['81','ACOBAMBILLA'],
['81','ACORIA'],
['81','CONAYCA'],
['81','CUENCA'],
['81','HUACHOCOLPA'],
['81','HUAYLLAHUARA'],
['81','IZCUCHACA'],
['81','LARIA'],
['81','MANTA'],
['81','MARISCAL CACERES'],
['81','MOYA'],
['81','NUEVO OCCORO'],
['81','PALCA'],
['81','PILCHACA'],
['81','VILCA'],
['81','YAULI'],
['81','ASCENSION'],
['81','HUANDO'],
['82','ACOBAMBA'],
['82','ANDABAMBA'],
['82','ANTA'],
['82','CAJA'],
['82','MARCAS'],
['82','PAUCARA'],
['82','POMACOCHA'],
['82','ROSARIO'],
['83','LIRCAY'],
['83','ANCHONGA'],
['83','CALLANMARCA'],
['83','CCOCHACCASA'],
['83','CHINCHO'],
['83','CONGALLA'],
['83','HUANCA-HUANCA'],
['83','HUAYLLAY GRANDE'],
['83','JULCAMARCA'],
['83','SAN ANTONIO DE ANTAPARCO'],
['83','SANTO TOMAS DE PATA'],
['83','SECCLLA'],
['84','CASTROVIRREYNA'],
['84','ARMA'],
['84','AURAHUA'],
['84','CAPILLAS'],
['84','CHUPAMARCA'],
['84','COCAS'],
['84','HUACHOS'],
['84','HUAMATAMBO'],
['84','MOLLEPAMPA'],
['84','SAN JUAN'],
['84','SANTA ANA'],
['84','TANTARA'],
['84','TICRAPO'],
['85','CHURCAMPA'],
['85','ANCO'],
['85','CHINCHIHUASI'],
['85','EL CARMEN'],
['85','LA MERCED'],
['85','LOCROJA'],
['85','PAUCARBAMBA'],
['85','SAN MIGUEL DE MAYOCC'],
['85','SAN PEDRO DE CORIS'],
['85','PACHAMARCA'],
['85','COSME'],
['86','HUAYTARA'],
['86','AYAVI'],
['86','CORDOVA'],
['86','HUAYACUNDO ARMA'],
['86','LARAMARCA'],
['86','OCOYO'],
['86','PILPICHACA'],
['86','QUERCO'],
['86','QUITO-ARMA'],
['86','SAN ANTONIO DE CUSICANCHA'],
['86','SAN FRANCISCO DE SANGAYAICO'],
['86','SAN ISIDRO'],
['86','SANTIAGO DE CHOCORVOS'],
['86','SANTIAGO DE QUIRAHUARA'],
['86','SANTO DOMINGO DE CAPILLAS'],
['86','TAMBO'],
['87','PAMPAS'],
['87','ACOSTAMBO'],
['87','ACRAQUIA'],
['87','AHUAYCHA'],
['87','COLCABAMBA'],
['87','DANIEL HERNANDEZ'],
['87','HUACHOCOLPA'],
['87','HUARIBAMBA'],
['87','ÑAHUIMPUQUIO'],
['87','PAZOS'],
['87','QUISHUAR'],
['87','SALCABAMBA'],
['87','SALCAHUASI'],
['87','SAN MARCOS DE ROCCHAC'],
['87','SURCUBAMBA'],
['87','TINTAY PUNCU'],
['87','QUICHUAS'],
['87','ANDAYMARCA'],
['87','ROBLE'],
['87','PICHOS'],
['87','SANTIAGO DE TUCUMA'],
['88','HUANUCO'],
['88','AMARILIS'],
['88','CHINCHAO'],
['88','CHURUBAMBA'],
['88','MARGOS'],
['88','QUISQUI (KICHKI)'],
['88','SAN FRANCISCO DE CAYRAN'],
['88','SAN PEDRO DE CHAULAN'],
['88','SANTA MARIA DEL VALLE'],
['88','YARUMAYO'],
['88','PILLCO MARCA'],
['88','YACUS'],
['88','SAN PABLO DE PILLAO'],
['89','AMBO'],
['89','CAYNA'],
['89','COLPAS'],
['89','CONCHAMARCA'],
['89','HUACAR'],
['89','SAN FRANCISCO'],
['89','SAN RAFAEL'],
['89','TOMAY KICHWA'],
['90','LA UNION'],
['90','CHUQUIS'],
['90','MARIAS'],
['90','PACHAS'],
['90','QUIVILLA'],
['90','RIPAN'],
['90','SHUNQUI'],
['90','SILLAPATA'],
['90','YANAS'],
['91','HUACAYBAMBA'],
['91','CANCHABAMBA'],
['91','COCHABAMBA'],
['91','PINRA'],
['92','LLATA'],
['92','ARANCAY'],
['92','CHAVIN DE PARIARCA'],
['92','JACAS GRANDE'],
['92','JIRCAN'],
['92','MIRAFLORES'],
['92','MONZON'],
['92','PUNCHAO'],
['92','PUÑOS'],
['92','SINGA'],
['92','TANTAMAYO'],
['93','RUPA-RUPA'],
['93','DANIEL ALOMIA ROBLES'],
['93','HERMILIO VALDIZAN'],
['93','JOSE CRESPO Y CASTILLO'],
['93','LUYANDO'],
['93','MARIANO DAMASO BERAUN'],
['93','PUCAYACU'],
['93','CASTILLO GRANDE'],
['93','PUEBLO NUEVO'],
['93','SANTO DOMINGO DE ANDA'],
['94','HUACRACHUCO'],
['94','CHOLON'],
['94','SAN BUENAVENTURA'],
['94','LA MORADA'],
['94','SANTA ROSA DE ALTO YANAJANCA'],
['95','PANAO'],
['95','CHAGLLA'],
['95','MOLINO'],
['95','UMARI'],
['96','PUERTO INCA'],
['96','CODO DEL POZUZO'],
['96','HONORIA'],
['96','TOURNAVISTA'],
['96','YUYAPICHIS'],
['97','JESUS'],
['97','BAÑOS'],
['97','JIVIA'],
['97','QUEROPALCA'],
['97','RONDOS'],
['97','SAN FRANCISCO DE ASIS'],
['97','SAN MIGUEL DE CAURI'],
['98','CHAVINILLO'],
['98','CAHUAC'],
['98','CHACABAMBA'],
['98','APARICIO POMARES'],
['98','JACAS CHICO'],
['98','OBAS'],
['98','PAMPAMARCA'],
['98','CHORAS'],
['99','ICA'],
['99','LA TINGUIÑA'],
['99','LOS AQUIJES'],
['99','OCUCAJE'],
['99','PACHACUTEC'],
['99','PARCONA'],
['99','PUEBLO NUEVO'],
['99','SALAS'],
['99','SAN JOSE DE LOS MOLINOS'],
['99','SAN JUAN BAUTISTA'],
['99','SANTIAGO'],
['99','SUBTANJALLA'],
['99','TATE'],
['99','YAUCA DEL ROSARIO'],
['100','CHINCHA ALTA'],
['100','ALTO LARAN'],
['100','CHAVIN'],
['100','CHINCHA BAJA'],
['100','EL CARMEN'],
['100','GROCIO PRADO'],
['100','PUEBLO NUEVO'],
['100','SAN JUAN DE YANAC'],
['100','SAN PEDRO DE HUACARPANA'],
['100','SUNAMPE'],
['100','TAMBO DE MORA'],
['101','NASCA'],
['101','CHANGUILLO'],
['101','EL INGENIO'],
['101','MARCONA'],
['101','VISTA ALEGRE'],
['102','PALPA'],
['102','LLIPATA'],
['102','RIO GRANDE'],
['102','SANTA CRUZ'],
['102','TIBILLO'],
['103','PISCO'],
['103','HUANCANO'],
['103','HUMAY'],
['103','INDEPENDENCIA'],
['103','PARACAS'],
['103','SAN ANDRES'],
['103','SAN CLEMENTE'],
['103','TUPAC AMARU INCA'],
['104','HUANCAYO'],
['104','CARHUACALLANGA'],
['104','CHACAPAMPA'],
['104','CHICCHE'],
['104','CHILCA'],
['104','CHONGOS ALTO'],
['104','CHUPURO'],
['104','COLCA'],
['104','CULLHUAS'],
['104','EL TAMBO'],
['104','HUACRAPUQUIO'],
['104','HUALHUAS'],
['104','HUANCAN'],
['104','HUASICANCHA'],
['104','HUAYUCACHI'],
['104','INGENIO'],
['104','PARIAHUANCA'],
['104','PILCOMAYO'],
['104','PUCARA'],
['104','QUICHUAY'],
['104','QUILCAS'],
['104','SAN AGUSTIN'],
['104','SAN JERONIMO DE TUNAN'],
['104','SAÑO'],
['104','SAPALLANGA'],
['104','SICAYA'],
['104','SANTO DOMINGO DE ACOBAMBA'],
['104','VIQUES'],
['105','CONCEPCION'],
['105','ACO'],
['105','ANDAMARCA'],
['105','CHAMBARA'],
['105','COCHAS'],
['105','COMAS'],
['105','HEROINAS TOLEDO'],
['105','MANZANARES'],
['105','MARISCAL CASTILLA'],
['105','MATAHUASI'],
['105','MITO'],
['105','NUEVE DE JULIO'],
['105','ORCOTUNA'],
['105','SAN JOSE DE QUERO'],
['105','SANTA ROSA DE OCOPA'],
['106','CHANCHAMAYO'],
['106','PERENE'],
['106','PICHANAQUI'],
['106','SAN LUIS DE SHUARO'],
['106','SAN RAMON'],
['106','VITOC'],
['107','JAUJA'],
['107','ACOLLA'],
['107','APATA'],
['107','ATAURA'],
['107','CANCHAYLLO'],
['107','CURICACA'],
['107','EL MANTARO'],
['107','HUAMALI'],
['107','HUARIPAMPA'],
['107','HUERTAS'],
['107','JANJAILLO'],
['107','JULCAN'],
['107','LEONOR ORDOÑEZ'],
['107','LLOCLLAPAMPA'],
['107','MARCO'],
['107','MASMA'],
['107','MASMA CHICCHE'],
['107','MOLINOS'],
['107','MONOBAMBA'],
['107','MUQUI'],
['107','MUQUIYAUYO'],
['107','PACA'],
['107','PACCHA'],
['107','PANCAN'],
['107','PARCO'],
['107','POMACANCHA'],
['107','RICRAN'],
['107','SAN LORENZO'],
['107','SAN PEDRO DE CHUNAN'],
['107','SAUSA'],
['107','SINCOS'],
['107','TUNAN MARCA'],
['107','YAULI'],
['107','YAUYOS'],
['108','JUNIN'],
['108','CARHUAMAYO'],
['108','ONDORES'],
['108','ULCUMAYO'],
['109','SATIPO'],
['109','COVIRIALI'],
['109','LLAYLLA'],
['109','MAZAMARI'],
['109','PAMPA HERMOSA'],
['109','PANGOA'],
['109','RIO NEGRO'],
['109','RIO TAMBO'],
['109','VIZCATAN DEL ENE'],
['110','TARMA'],
['110','ACOBAMBA'],
['110','HUARICOLCA'],
['110','HUASAHUASI'],
['110','LA UNION'],
['110','PALCA'],
['110','PALCAMAYO'],
['110','SAN PEDRO DE CAJAS'],
['110','TAPO'],
['111','LA OROYA'],
['111','CHACAPALPA'],
['111','HUAY-HUAY'],
['111','MARCAPOMACOCHA'],
['111','MOROCOCHA'],
['111','PACCHA'],
['111','SANTA BARBARA DE CARHUACAYAN'],
['111','SANTA ROSA DE SACCO'],
['111','SUITUCANCHA'],
['111','YAULI'],
['112','CHUPACA'],
['112','AHUAC'],
['112','CHONGOS BAJO'],
['112','HUACHAC'],
['112','HUAMANCACA CHICO'],
['112','SAN JUAN DE ISCOS'],
['112','SAN JUAN DE JARPA'],
['112','TRES DE DICIEMBRE'],
['112','YANACANCHA'],
['113','TRUJILLO'],
['113','EL PORVENIR'],
['113','FLORENCIA DE MORA'],
['113','HUANCHACO'],
['113','LA ESPERANZA'],
['113','LAREDO'],
['113','MOCHE'],
['113','POROTO'],
['113','SALAVERRY'],
['113','SIMBAL'],
['113','VICTOR LARCO HERRERA'],
['114','ASCOPE'],
['114','CHICAMA'],
['114','CHOCOPE'],
['114','MAGDALENA DE CAO'],
['114','PAIJAN'],
['114','RAZURI'],
['114','SANTIAGO DE CAO'],
['114','CASA GRANDE'],
['115','BOLIVAR'],
['115','BAMBAMARCA'],
['115','CONDORMARCA'],
['115','LONGOTEA'],
['115','UCHUMARCA'],
['115','UCUNCHA'],
['116','CHEPEN'],
['116','PACANGA'],
['116','PUEBLO NUEVO'],
['117','JULCAN'],
['117','CALAMARCA'],
['117','CARABAMBA'],
['117','HUASO'],
['118','OTUZCO'],
['118','AGALLPAMPA'],
['118','CHARAT'],
['118','HUARANCHAL'],
['118','LA CUESTA'],
['118','MACHE'],
['118','PARANDAY'],
['118','SALPO'],
['118','SINSICAP'],
['118','USQUIL'],
['119','SAN PEDRO DE LLOC'],
['119','GUADALUPE'],
['119','JEQUETEPEQUE'],
['119','PACASMAYO'],
['119','SAN JOSE'],
['120','TAYABAMBA'],
['120','BULDIBUYO'],
['120','CHILLIA'],
['120','HUANCASPATA'],
['120','HUAYLILLAS'],
['120','HUAYO'],
['120','ONGON'],
['120','PARCOY'],
['120','PATAZ'],
['120','PIAS'],
['120','SANTIAGO DE CHALLAS'],
['120','TAURIJA'],
['120','URPAY'],
['121','HUAMACHUCO'],
['121','CHUGAY'],
['121','COCHORCO'],
['121','CURGOS'],
['121','MARCABAL'],
['121','SANAGORAN'],
['121','SARIN'],
['121','SARTIMBAMBA'],
['122','SANTIAGO DE CHUCO'],
['122','ANGASMARCA'],
['122','CACHICADAN'],
['122','MOLLEBAMBA'],
['122','MOLLEPATA'],
['122','QUIRUVILCA'],
['122','SANTA CRUZ DE CHUCA'],
['122','SITABAMBA'],
['123','CASCAS'],
['123','LUCMA'],
['123','MARMOT'],
['123','SAYAPULLO'],
['124','VIRU'],
['124','CHAO'],
['124','GUADALUPITO'],
['125','CHICLAYO'],
['125','CHONGOYAPE'],
['125','ETEN'],
['125','ETEN PUERTO'],
['125','JOSE LEONARDO ORTIZ'],
['125','LA VICTORIA'],
['125','LAGUNAS'],
['125','MONSEFU'],
['125','NUEVA ARICA'],
['125','OYOTUN'],
['125','PICSI'],
['125','PIMENTEL'],
['125','REQUE'],
['125','SANTA ROSA'],
['125','SAÑA'],
['125','CAYALTI'],
['125','PATAPO'],
['125','POMALCA'],
['125','PUCALA'],
['125','TUMAN'],
['126','FERREÑAFE'],
['126','CAÑARIS'],
['126','INCAHUASI'],
['126','MANUEL ANTONIO MESONES MURO'],
['126','PITIPO'],
['126','PUEBLO NUEVO'],
['127','LAMBAYEQUE'],
['127','CHOCHOPE'],
['127','ILLIMO'],
['127','JAYANCA'],
['127','MOCHUMI'],
['127','MORROPE'],
['127','MOTUPE'],
['127','OLMOS'],
['127','PACORA'],
['127','SALAS'],
['127','SAN JOSE'],
['127','TUCUME'],
['128','LIMA'],
['128','ANCON'],
['128','ATE'],
['128','BARRANCO'],
['128','BREÑA'],
['128','CARABAYLLO'],
['128','CHACLACAYO'],
['128','CHORRILLOS'],
['128','CIENEGUILLA'],
['128','COMAS'],
['128','EL AGUSTINO'],
['128','INDEPENDENCIA'],
['128','JESUS MARIA'],
['128','LA MOLINA'],
['128','LA VICTORIA'],
['128','LINCE'],
['128','LOS OLIVOS'],
['128','LURIGANCHO'],
['128','LURIN'],
['128','MAGDALENA DEL MAR'],
['128','PUEBLO LIBRE'],
['128','MIRAFLORES'],
['128','PACHACAMAC'],
['128','PUCUSANA'],
['128','PUENTE PIEDRA'],
['128','PUNTA HERMOSA'],
['128','PUNTA NEGRA'],
['128','RIMAC'],
['128','SAN BARTOLO'],
['128','SAN BORJA'],
['128','SAN ISIDRO'],
['128','SAN JUAN DE LURIGANCHO'],
['128','SAN JUAN DE MIRAFLORES'],
['128','SAN LUIS'],
['128','SAN MARTIN DE PORRES'],
['128','SAN MIGUEL'],
['128','SANTA ANITA'],
['128','SANTA MARIA DEL MAR'],
['128','SANTA ROSA'],
['128','SANTIAGO DE SURCO'],
['128','SURQUILLO'],
['128','VILLA EL SALVADOR'],
['128','VILLA MARIA DEL TRIUNFO'],
['128','SANTA MARIA DE HUACHIPA /1'],
['129','BARRANCA'],
['129','PARAMONGA'],
['129','PATIVILCA'],
['129','SUPE'],
['129','SUPE PUERTO'],
['130','CAJATAMBO'],
['130','COPA'],
['130','GORGOR'],
['130','HUANCAPON'],
['130','MANAS'],
['131','CANTA'],
['131','ARAHUAY'],
['131','HUAMANTANGA'],
['131','HUAROS'],
['131','LACHAQUI'],
['131','SAN BUENAVENTURA'],
['131','SANTA ROSA DE QUIVES'],
['132','SAN VICENTE DE CAÑETE'],
['132','ASIA'],
['132','CALANGO'],
['132','CERRO AZUL'],
['132','CHILCA'],
['132','COAYLLO'],
['132','IMPERIAL'],
['132','LUNAHUANA'],
['132','MALA'],
['132','NUEVO IMPERIAL'],
['132','PACARAN'],
['132','QUILMANA'],
['132','SAN ANTONIO'],
['132','SAN LUIS'],
['132','SANTA CRUZ DE FLORES'],
['132','ZUÑIGA'],
['133','HUARAL'],
['133','ATAVILLOS ALTO'],
['133','ATAVILLOS BAJO'],
['133','AUCALLAMA'],
['133','CHANCAY'],
['133','IHUARI'],
['133','LAMPIAN'],
['133','PACARAOS'],
['133','SAN MIGUEL DE ACOS'],
['133','SANTA CRUZ DE ANDAMARCA'],
['133','SUMBILCA'],
['133','VEINTISIETE DE NOVIEMBRE'],
['134','MATUCANA'],
['134','ANTIOQUIA'],
['134','CALLAHUANCA'],
['134','CARAMPOMA'],
['134','CHICLA'],
['134','CUENCA'],
['134','HUACHUPAMPA'],
['134','HUANZA'],
['134','HUAROCHIRI'],
['134','LAHUAYTAMBO'],
['134','LANGA'],
['134','LARAOS'],
['134','MARIATANA'],
['134','RICARDO PALMA'],
['134','SAN ANDRES DE TUPICOCHA'],
['134','SAN ANTONIO'],
['134','SAN BARTOLOME'],
['134','SAN DAMIAN'],
['134','SAN JUAN DE IRIS'],
['134','SAN JUAN DE TANTARANCHE'],
['134','SAN LORENZO DE QUINTI'],
['134','SAN MATEO'],
['134','SAN MATEO DE OTAO'],
['134','SAN PEDRO DE CASTA'],
['134','SAN PEDRO DE HUANCAYRE'],
['134','SANGALLAYA'],
['134','SANTA CRUZ DE COCACHACRA'],
['134','SANTA EULALIA'],
['134','SANTIAGO DE ANCHUCAYA'],
['134','SANTIAGO DE TUNA'],
['134','SANTO DOMINGO DE LOS OLLEROS'],
['134','SURCO'],
['135','HUACHO'],
['135','AMBAR'],
['135','CALETA DE CARQUIN'],
['135','CHECRAS'],
['135','HUALMAY'],
['135','HUAURA'],
['135','LEONCIO PRADO'],
['135','PACCHO'],
['135','SANTA LEONOR'],
['135','SANTA MARIA'],
['135','SAYAN'],
['135','VEGUETA'],
['136','OYON'],
['136','ANDAJES'],
['136','CAUJUL'],
['136','COCHAMARCA'],
['136','NAVAN'],
['136','PACHANGARA'],
['137','YAUYOS'],
['137','ALIS'],
['137','ALLAUCA'],
['137','AYAVIRI'],
['137','AZANGARO'],
['137','CACRA'],
['137','CARANIA'],
['137','CATAHUASI'],
['137','CHOCOS'],
['137','COCHAS'],
['137','COLONIA'],
['137','HONGOS'],
['137','HUAMPARA'],
['137','HUANCAYA'],
['137','HUANGASCAR'],
['137','HUANTAN'],
['137','HUAÑEC'],
['137','LARAOS'],
['137','LINCHA'],
['137','MADEAN'],
['137','MIRAFLORES'],
['137','OMAS'],
['137','PUTINZA'],
['137','QUINCHES'],
['137','QUINOCAY'],
['137','SAN JOAQUIN'],
['137','SAN PEDRO DE PILAS'],
['137','TANTA'],
['137','TAURIPAMPA'],
['137','TOMAS'],
['137','TUPE'],
['137','VIÑAC'],
['137','VITIS'],
['138','IQUITOS'],
['138','ALTO NANAY'],
['138','FERNANDO LORES'],
['138','INDIANA'],
['138','LAS AMAZONAS'],
['138','MAZAN'],
['138','NAPO'],
['138','PUNCHANA'],
['138','TORRES CAUSANA'],
['138','BELEN'],
['138','SAN JUAN BAUTISTA'],
['139','YURIMAGUAS'],
['139','BALSAPUERTO'],
['139','JEBEROS'],
['139','LAGUNAS'],
['139','SANTA CRUZ'],
['139','TENIENTE CESAR LOPEZ ROJAS'],
['140','NAUTA'],
['140','PARINARI'],
['140','TIGRE'],
['140','TROMPETEROS'],
['140','URARINAS'],
['141','RAMON CASTILLA'],
['141','PEBAS'],
['141','YAVARI'],
['141','SAN PABLO'],
['142','REQUENA'],
['142','ALTO TAPICHE'],
['142','CAPELO'],
['142','EMILIO SAN MARTIN'],
['142','MAQUIA'],
['142','PUINAHUA'],
['142','SAQUENA'],
['142','SOPLIN'],
['142','TAPICHE'],
['142','JENARO HERRERA'],
['142','YAQUERANA'],
['143','CONTAMANA'],
['143','INAHUAYA'],
['143','PADRE MARQUEZ'],
['143','PAMPA HERMOSA'],
['143','SARAYACU'],
['143','VARGAS GUERRA'],
['144','BARRANCA'],
['144','CAHUAPANAS'],
['144','MANSERICHE'],
['144','MORONA'],
['144','PASTAZA'],
['144','ANDOAS'],
['145','PUTUMAYO'],
['145','ROSA PANDURO'],
['145','TENIENTE MANUEL CLAVERO'],
['145','YAGUAS'],
['146','TAMBOPATA'],
['146','INAMBARI'],
['146','LAS PIEDRAS'],
['146','LABERINTO'],
['147','MANU'],
['147','FITZCARRALD'],
['147','MADRE DE DIOS'],
['147','HUEPETUHE'],
['148','IÑAPARI'],
['148','IBERIA'],
['148','TAHUAMANU'],
['149','MOQUEGUA'],
['149','CARUMAS'],
['149','CUCHUMBAYA'],
['149','SAMEGUA'],
['149','SAN CRISTOBAL'],
['149','TORATA'],
['150','OMATE'],
['150','CHOJATA'],
['150','COALAQUE'],
['150','ICHUÑA'],
['150','LA CAPILLA'],
['150','LLOQUE'],
['150','MATALAQUE'],
['150','PUQUINA'],
['150','QUINISTAQUILLAS'],
['150','UBINAS'],
['150','YUNGA'],
['151','ILO'],
['151','EL ALGARROBAL'],
['151','PACOCHA'],
['152','CHAUPIMARCA'],
['152','HUACHON'],
['152','HUARIACA'],
['152','HUAYLLAY'],
['152','NINACACA'],
['152','PALLANCHACRA'],
['152','PAUCARTAMBO'],
['152','SAN FRANCISCO DE ASIS DE YARUSYACAN'],
['152','SIMON BOLIVAR'],
['152','TICLACAYAN'],
['152','TINYAHUARCO'],
['152','VICCO'],
['152','YANACANCHA'],
['153','YANAHUANCA'],
['153','CHACAYAN'],
['153','GOYLLARISQUIZGA'],
['153','PAUCAR'],
['153','SAN PEDRO DE PILLAO'],
['153','SANTA ANA DE TUSI'],
['153','TAPUC'],
['153','VILCABAMBA'],
['154','OXAPAMPA'],
['154','CHONTABAMBA'],
['154','HUANCABAMBA'],
['154','PALCAZU'],
['154','POZUZO'],
['154','PUERTO BERMUDEZ'],
['154','VILLA RICA'],
['154','CONSTITUCION'],
['155','PIURA'],
['155','CASTILLA'],
['155','CATACAOS'],
['155','CURA MORI'],
['155','EL TALLAN'],
['155','LA ARENA'],
['155','LA UNION'],
['155','LAS LOMAS'],
['155','TAMBO GRANDE'],
['155','VEINTISEIS DE OCTUBRE'],
['156','AYABACA'],
['156','FRIAS'],
['156','JILILI'],
['156','LAGUNAS'],
['156','MONTERO'],
['156','PACAIPAMPA'],
['156','PAIMAS'],
['156','SAPILLICA'],
['156','SICCHEZ'],
['156','SUYO'],
['157','HUANCABAMBA'],
['157','CANCHAQUE'],
['157','EL CARMEN DE LA FRONTERA'],
['157','HUARMACA'],
['157','LALAQUIZ'],
['157','SAN MIGUEL DE EL FAIQUE'],
['157','SONDOR'],
['157','SONDORILLO'],
['158','CHULUCANAS'],
['158','BUENOS AIRES'],
['158','CHALACO'],
['158','LA MATANZA'],
['158','MORROPON'],
['158','SALITRAL'],
['158','SAN JUAN DE BIGOTE'],
['158','SANTA CATALINA DE MOSSA'],
['158','SANTO DOMINGO'],
['158','YAMANGO'],
['159','PAITA'],
['159','AMOTAPE'],
['159','ARENAL'],
['159','COLAN'],
['159','LA HUACA'],
['159','TAMARINDO'],
['159','VICHAYAL'],
['160','SULLANA'],
['160','BELLAVISTA'],
['160','IGNACIO ESCUDERO'],
['160','LANCONES'],
['160','MARCAVELICA'],
['160','MIGUEL CHECA'],
['160','QUERECOTILLO'],
['160','SALITRAL'],
['161','PARIÑAS'],
['161','EL ALTO'],
['161','LA BREA'],
['161','LOBITOS'],
['161','LOS ORGANOS'],
['161','MANCORA'],
['162','SECHURA'],
['162','BELLAVISTA DE LA UNION'],
['162','BERNAL'],
['162','CRISTO NOS VALGA'],
['162','VICE'],
['162','RINCONADA LLICUAR'],
['163','PUNO'],
['163','ACORA'],
['163','AMANTANI'],
['163','ATUNCOLLA'],
['163','CAPACHICA'],
['163','CHUCUITO'],
['163','COATA'],
['163','HUATA'],
['163','MAÑAZO'],
['163','PAUCARCOLLA'],
['163','PICHACANI'],
['163','PLATERIA'],
['163','SAN ANTONIO'],
['163','TIQUILLACA'],
['163','VILQUE'],
['164','AZANGARO'],
['164','ACHAYA'],
['164','ARAPA'],
['164','ASILLO'],
['164','CAMINACA'],
['164','CHUPA'],
['164','JOSE DOMINGO CHOQUEHUANCA'],
['164','MUÑANI'],
['164','POTONI'],
['164','SAMAN'],
['164','SAN ANTON'],
['164','SAN JOSE'],
['164','SAN JUAN DE SALINAS'],
['164','SANTIAGO DE PUPUJA'],
['164','TIRAPATA'],
['165','MACUSANI'],
['165','AJOYANI'],
['165','AYAPATA'],
['165','COASA'],
['165','CORANI'],
['165','CRUCERO'],
['165','ITUATA'],
['165','OLLACHEA'],
['165','SAN GABAN'],
['165','USICAYOS'],
['166','JULI'],
['166','DESAGUADERO'],
['166','HUACULLANI'],
['166','KELLUYO'],
['166','PISACOMA'],
['166','POMATA'],
['166','ZEPITA'],
['167','ILAVE'],
['167','CAPAZO'],
['167','PILCUYO'],
['167','SANTA ROSA'],
['167','CONDURIRI'],
['168','HUANCANE'],
['168','COJATA'],
['168','HUATASANI'],
['168','INCHUPALLA'],
['168','PUSI'],
['168','ROSASPATA'],
['168','TARACO'],
['168','VILQUE CHICO'],
['169','LAMPA'],
['169','CABANILLA'],
['169','CALAPUJA'],
['169','NICASIO'],
['169','OCUVIRI'],
['169','PALCA'],
['169','PARATIA'],
['169','PUCARA'],
['169','SANTA LUCIA'],
['169','VILAVILA'],
['170','AYAVIRI'],
['170','ANTAUTA'],
['170','CUPI'],
['170','LLALLI'],
['170','MACARI'],
['170','NUÑOA'],
['170','ORURILLO'],
['170','SANTA ROSA'],
['170','UMACHIRI'],
['171','MOHO'],
['171','CONIMA'],
['171','HUAYRAPATA'],
['171','TILALI'],
['172','PUTINA'],
['172','ANANEA'],
['172','PEDRO VILCA APAZA'],
['172','QUILCAPUNCU'],
['172','SINA'],
['173','JULIACA'],
['173','CABANA'],
['173','CABANILLAS'],
['173','SAN MIGUEL'],
['173','CARACOTO'],
['174','SANDIA'],
['174','CUYOCUYO'],
['174','LIMBANI'],
['174','PATAMBUCO'],
['174','PHARA'],
['174','QUIACA'],
['174','SAN JUAN DEL ORO'],
['174','YANAHUAYA'],
['174','ALTO INAMBARI'],
['174','SAN PEDRO DE PUTINA PUNCO'],
['175','YUNGUYO'],
['175','ANAPIA'],
['175','COPANI'],
['175','CUTURAPI'],
['175','OLLARAYA'],
['175','TINICACHI'],
['175','UNICACHI'],
['176','MOYOBAMBA'],
['176','CALZADA'],
['176','HABANA'],
['176','JEPELACIO'],
['176','SORITOR'],
['176','YANTALO'],
['177','BELLAVISTA'],
['177','ALTO BIAVO'],
['177','BAJO BIAVO'],
['177','HUALLAGA'],
['177','SAN PABLO'],
['177','SAN RAFAEL'],
['178','SAN JOSE DE SISA'],
['178','AGUA BLANCA'],
['178','SAN MARTIN'],
['178','SANTA ROSA'],
['178','SHATOJA'],
['179','SAPOSOA'],
['179','ALTO SAPOSOA'],
['179','EL ESLABON'],
['179','PISCOYACU'],
['179','SACANCHE'],
['179','TINGO DE SAPOSOA'],
['180','LAMAS'],
['180','ALONSO DE ALVARADO'],
['180','BARRANQUITA'],
['180','CAYNARACHI'],
['180','CUÑUMBUQUI'],
['180','PINTO RECODO'],
['180','RUMISAPA'],
['180','SAN ROQUE DE CUMBAZA'],
['180','SHANAO'],
['180','TABALOSOS'],
['180','ZAPATERO'],
['181','JUANJUI'],
['181','CAMPANILLA'],
['181','HUICUNGO'],
['181','PACHIZA'],
['181','PAJARILLO'],
['182','PICOTA'],
['182','BUENOS AIRES'],
['182','CASPISAPA'],
['182','PILLUANA'],
['182','PUCACACA'],
['182','SAN CRISTOBAL'],
['182','SAN HILARION'],
['182','SHAMBOYACU'],
['182','TINGO DE PONASA'],
['182','TRES UNIDOS'],
['183','RIOJA'],
['183','AWAJUN'],
['183','ELIAS SOPLIN VARGAS'],
['183','NUEVA CAJAMARCA'],
['183','PARDO MIGUEL'],
['183','POSIC'],
['183','SAN FERNANDO'],
['183','YORONGOS'],
['183','YURACYACU'],
['184','TARAPOTO'],
['184','ALBERTO LEVEAU'],
['184','CACATACHI'],
['184','CHAZUTA'],
['184','CHIPURANA'],
['184','EL PORVENIR'],
['184','HUIMBAYOC'],
['184','JUAN GUERRA'],
['184','LA BANDA DE SHILCAYO'],
['184','MORALES'],
['184','PAPAPLAYA'],
['184','SAN ANTONIO'],
['184','SAUCE'],
['184','SHAPAJA'],
['185','TOCACHE'],
['185','NUEVO PROGRESO'],
['185','POLVORA'],
['185','SHUNTE'],
['185','UCHIZA'],
['186','TACNA'],
['186','ALTO DE LA ALIANZA'],
['186','CALANA'],
['186','CIUDAD NUEVA'],
['186','INCLAN'],
['186','PACHIA'],
['186','PALCA'],
['186','POCOLLAY'],
['186','SAMA'],
['186','CORONEL GREGORIO ALBARRACIN LANCHIPA'],
['186','LA YARADA LOS PALOS'],
['187','CANDARAVE'],
['187','CAIRANI'],
['187','CAMILACA'],
['187','CURIBAYA'],
['187','HUANUARA'],
['187','QUILAHUANI'],
['188','LOCUMBA'],
['188','ILABAYA'],
['188','ITE'],
['189','TARATA'],
['189','HEROES ALBARRACIN'],
['189','ESTIQUE'],
['189','ESTIQUE-PAMPA'],
['189','SITAJARA'],
['189','SUSAPAYA'],
['189','TARUCACHI'],
['189','TICACO'],
['190','TUMBES'],
['190','CORRALES'],
['190','LA CRUZ'],
['190','PAMPAS DE HOSPITAL'],
['190','SAN JACINTO'],
['190','SAN JUAN DE LA VIRGEN'],
['191','ZORRITOS'],
['191','CASITAS'],
['191','CANOAS DE PUNTA SAL'],
['192','ZARUMILLA'],
['192','AGUAS VERDES'],
['192','MATAPALO'],
['192','PAPAYAL'],
['193','CALLERIA'],
['193','CAMPOVERDE'],
['193','IPARIA'],
['193','MASISEA'],
['193','YARINACOCHA'],
['193','NUEVA REQUENA'],
['193','MANANTAY'],
['194','RAYMONDI'],
['194','SEPAHUA'],
['194','TAHUANIA'],
['194','YURUA'],
['195','PADRE ABAD'],
['195','IRAZOLA'],
['195','CURIMANA'],
['195','NESHUYA'],
['195','ALEXANDER VON HUMBOLDT'],
['196','PURUS']
        ];
    
        foreach( $distritos as $dist){
            DB::table('distritos')->insert(['idProvincia'=>$dist[0],'Distrito'=>$dist[1]]);
        }
    }
}
