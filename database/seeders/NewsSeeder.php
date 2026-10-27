<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [

            [
                'title' => [
                    'en' => 'Multikultura launches a new community initiative',
                    'mk' => 'Мултикултура започнува нова иницијатива во заедницата',
                    'al' => 'Multikultura nis një iniciativë të re në komunitet',
                ],

                'short_description' => [
                    'en' => 'A new initiative focused on strengthening cooperation and inclusion in the community.',
                    'mk' => 'Нова иницијатива насочена кон зајакнување на соработката и инклузијата во заедницата.',
                    'al' => 'Një iniciativë e re e fokusuar në forcimin e bashkëpunimit dhe përfshirjes në komunitet.',
                ],

                'detailed_description' => [
                    'en' => 'Multikultura has launched a new community initiative aimed at bringing people together and creating opportunities for cooperation, dialogue and mutual understanding. The initiative includes a series of activities involving young people, community members and local organizations.',
                    'mk' => 'Мултикултура започна нова иницијатива во заедницата со цел да ги поврзе луѓето и да создаде можности за соработка, дијалог и меѓусебно разбирање. Иницијативата опфаќа серија активности во кои учествуваат млади, членови на заедницата и локални организации.',
                    'al' => 'Multikultura ka nisur një iniciativë të re në komunitet me qëllim bashkimin e njerëzve dhe krijimin e mundësive për bashkëpunim, dialog dhe mirëkuptim reciprok. Iniciativa përfshin një sërë aktivitetesh me pjesëmarrjen e të rinjve, anëtarëve të komunitetit dhe organizatave lokale.',
                ],

                'date' => '2026-10-01',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'Youth participation and community engagement',
                    'mk' => 'Учество на младите и ангажман во заедницата',
                    'al' => 'Pjesëmarrja e të rinjve dhe angazhimi në komunitet',
                ],

                'short_description' => [
                    'en' => 'Young people took part in activities designed to encourage dialogue and cooperation.',
                    'mk' => 'Младите учествуваа во активности насочени кон поттикнување дијалог и соработка.',
                    'al' => 'Të rinjtë morën pjesë në aktivitete të krijuara për të nxitur dialogun dhe bashkëpunimin.',
                ],

                'detailed_description' => [
                    'en' => 'Young participants had the opportunity to share their ideas, experiences and perspectives through a series of interactive activities. The program encouraged active participation, teamwork and open communication between participants from different backgrounds.',
                    'mk' => 'Младите учесници имаа можност да ги споделат своите идеи, искуства и перспективи преку серија интерактивни активности. Програмата поттикна активно учество, тимска работа и отворена комуникација меѓу учесници од различни средини.',
                    'al' => 'Pjesëmarrësit e rinj patën mundësinë të ndajnë idetë, përvojat dhe perspektivat e tyre përmes një sërë aktivitetesh interaktive. Programi inkurajoi pjesëmarrjen aktive, punën në ekip dhe komunikimin e hapur mes pjesëmarrësve me prejardhje të ndryshme.',
                ],

                'date' => '2026-09-25',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'Building bridges through culture',
                    'mk' => 'Градење мостови преку културата',
                    'al' => 'Ndërtimi i urave përmes kulturës',
                ],

                'short_description' => [
                    'en' => 'Cultural activities brought people together and created opportunities for meaningful exchange.',
                    'mk' => 'Културните активности ги обединија луѓето и создадоа можности за значајна размена.',
                    'al' => 'Aktivitetet kulturore bashkuan njerëzit dhe krijuan mundësi për shkëmbim domethënës.',
                ],

                'detailed_description' => [
                    'en' => 'Culture provides an important space for people to meet, communicate and learn from one another. Through creative activities, participants explored different traditions and perspectives while discovering common values and interests.',
                    'mk' => 'Културата создава важен простор за луѓето да се сретнат, комуницираат и да учат едни од други. Преку креативни активности, учесниците истражуваа различни традиции и перспективи, истовремено откривајќи заеднички вредности и интереси.',
                    'al' => 'Kultura ofron një hapësirë të rëndësishme ku njerëzit mund të takohen, komunikojnë dhe mësojnë nga njëri-tjetri. Përmes aktiviteteve krijuese, pjesëmarrësit eksploruan tradita dhe perspektiva të ndryshme duke zbuluar vlera dhe interesa të përbashkëta.',
                ],

                'date' => '2026-09-18',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'New educational opportunities for young people',
                    'mk' => 'Нови образовни можности за младите',
                    'al' => 'Mundësi të reja arsimore për të rinjtë',
                ],

                'short_description' => [
                    'en' => 'The latest activities provide young people with new opportunities to learn and develop.',
                    'mk' => 'Најновите активности им овозможуваат на младите нови можности за учење и развој.',
                    'al' => 'Aktivitetet e fundit u ofrojnë të rinjve mundësi të reja për të mësuar dhe zhvilluar.',
                ],

                'detailed_description' => [
                    'en' => 'The educational activities are designed to support young people in developing new skills and expanding their knowledge. Participants take part in workshops, discussions and practical exercises that encourage creativity and critical thinking.',
                    'mk' => 'Едукативните активности се наменети за поддршка на младите во развивањето нови вештини и проширувањето на нивното знаење. Учесниците учествуваат во работилници, дискусии и практични вежби кои ја поттикнуваат креативноста и критичкото размислување.',
                    'al' => 'Aktivitetet edukative janë krijuar për të mbështetur të rinjtë në zhvillimin e aftësive të reja dhe zgjerimin e njohurive të tyre. Pjesëmarrësit marrin pjesë në punëtori, diskutime dhe ushtrime praktike që nxisin kreativitetin dhe mendimin kritik.',
                ],

                'date' => '2026-09-10',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'Community dialogue event held successfully',
                    'mk' => 'Успешно одржан настан за дијалог во заедницата',
                    'al' => 'U mbajt me sukses një ngjarje për dialogun në komunitet',
                ],

                'short_description' => [
                    'en' => 'Representatives and community members discussed opportunities for stronger cooperation.',
                    'mk' => 'Претставници и членови на заедницата разговараа за можности за посилна соработка.',
                    'al' => 'Përfaqësuesit dhe anëtarët e komunitetit diskutuan mundësitë për bashkëpunim më të fortë.',
                ],

                'detailed_description' => [
                    'en' => 'The community dialogue brought together representatives from different groups to discuss current challenges and future opportunities. The participants exchanged ideas and identified areas where cooperation can be strengthened.',
                    'mk' => 'На дијалогот во заедницата се собраа претставници од различни групи за да разговараат за актуелните предизвици и идните можности. Учесниците разменија идеи и идентификуваа области во кои соработката може дополнително да се зајакне.',
                    'al' => 'Dialogu në komunitet bashkoi përfaqësues nga grupe të ndryshme për të diskutuar sfidat aktuale dhe mundësitë e ardhshme. Pjesëmarrësit shkëmbyen ide dhe identifikuan fusha ku bashkëpunimi mund të forcohet më tej.',
                ],

                'date' => '2026-09-03',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'Multicultural activities continue',
                    'mk' => 'Мултикултурните активности продолжуваат',
                    'al' => 'Aktivitetet multikulturore vazhdojnë',
                ],

                'short_description' => [
                    'en' => 'A series of activities continues to promote diversity, inclusion and mutual understanding.',
                    'mk' => 'Серијата активности продолжува со промовирање на различноста, инклузијата и меѓусебното разбирање.',
                    'al' => 'Një seri aktivitetesh vazhdon të promovojë diversitetin, përfshirjen dhe mirëkuptimin reciprok.',
                ],

                'detailed_description' => [
                    'en' => 'Multikultura continues to organize activities that encourage people from different backgrounds to connect and work together. The activities include cultural exchanges, educational sessions and community meetings.',
                    'mk' => 'Мултикултура продолжува да организира активности кои ги поттикнуваат луѓето од различни средини да се поврзуваат и да работат заедно. Активностите вклучуваат културни размени, едукативни сесии и средби со заедницата.',
                    'al' => 'Multikultura vazhdon të organizojë aktivitete që inkurajojnë njerëzit me prejardhje të ndryshme të lidhen dhe të punojnë së bashku. Aktivitetet përfshijnë shkëmbime kulturore, sesione edukative dhe takime me komunitetin.',
                ],

                'date' => '2026-08-27',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'Volunteers supporting local initiatives',
                    'mk' => 'Волонтери ги поддржуваат локалните иницијативи',
                    'al' => 'Vullnetarët mbështesin iniciativat lokale',
                ],

                'short_description' => [
                    'en' => 'Volunteers contributed their time and experience to support activities in the local community.',
                    'mk' => 'Волонтерите го вложија своето време и искуство во поддршка на активностите во локалната заедница.',
                    'al' => 'Vullnetarët kontribuuan me kohën dhe përvojën e tyre për të mbështetur aktivitetet në komunitetin lokal.',
                ],

                'detailed_description' => [
                    'en' => 'Volunteers play an important role in supporting community activities. Their commitment and experience help make events more accessible and create new opportunities for people to participate and contribute.',
                    'mk' => 'Волонтерите имаат важна улога во поддршката на активностите во заедницата. Нивната посветеност и искуство помагаат настаните да бидат подостапни и создаваат нови можности за луѓето да учествуваат и придонесуваат.',
                    'al' => 'Vullnetarët luajnë një rol të rëndësishëm në mbështetjen e aktiviteteve në komunitet. Përkushtimi dhe përvoja e tyre ndihmojnë që aktivitetet të jenë më të qasshme dhe krijojnë mundësi të reja për njerëzit që të marrin pjesë dhe të kontribuojnë.',
                ],

                'date' => '2026-08-20',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'Workshop promotes intercultural understanding',
                    'mk' => 'Работилница за меѓукултурно разбирање',
                    'al' => 'Punëtori për mirëkuptimin ndërkulturor',
                ],

                'short_description' => [
                    'en' => 'Participants explored ways to improve communication and understanding between different communities.',
                    'mk' => 'Учесниците истражуваа начини за подобрување на комуникацијата и разбирањето меѓу различните заедници.',
                    'al' => 'Pjesëmarrësit eksploruan mënyra për të përmirësuar komunikimin dhe mirëkuptimin ndërmjet komuniteteve të ndryshme.',
                ],

                'detailed_description' => [
                    'en' => 'The workshop provided participants with an opportunity to discuss intercultural communication and explore practical ways of building trust. Through group exercises and open discussions, participants shared experiences and learned from each other.',
                    'mk' => 'Работилницата им овозможи на учесниците да разговараат за меѓукултурната комуникација и да истражуваат практични начини за градење доверба. Преку групни вежби и отворени дискусии, учесниците споделија искуства и учеа едни од други.',
                    'al' => 'Punëtoria u dha pjesëmarrësve mundësinë të diskutojnë komunikimin ndërkulturor dhe të eksplorojnë mënyra praktike për ndërtimin e besimit. Përmes ushtrimeve në grup dhe diskutimeve të hapura, pjesëmarrësit ndanë përvojat dhe mësuan nga njëri-tjetri.',
                ],

                'date' => '2026-08-12',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'Celebrating diversity together',
                    'mk' => 'Заедно ја славиме различноста',
                    'al' => 'Së bashku festojmë diversitetin',
                ],

                'short_description' => [
                    'en' => 'A community event celebrated diversity and the values that connect people.',
                    'mk' => 'Настанот во заедницата ја прослави различноста и вредностите што ги поврзуваат луѓето.',
                    'al' => 'Një ngjarje në komunitet festoi diversitetin dhe vlerat që i bashkojnë njerëzit.',
                ],

                'detailed_description' => [
                    'en' => 'The community event brought together people of different ages and backgrounds to celebrate diversity. Participants enjoyed cultural activities and had the opportunity to meet, exchange ideas and strengthen connections.',
                    'mk' => 'Настанот во заедницата ги собра луѓето од различни возрасти и средини за да ја прослават различноста. Учесниците уживаа во културните активности и имаа можност да се запознаат, да разменат идеи и да ги зајакнат меѓусебните врски.',
                    'al' => 'Ngjarja në komunitet bashkoi njerëz të moshave dhe prejardhjeve të ndryshme për të festuar diversitetin. Pjesëmarrësit shijuan aktivitetet kulturore dhe patën mundësinë të takohen, të shkëmbejnë ide dhe të forcojnë lidhjet.',
                ],

                'date' => '2026-08-05',
                'image' => null,
                'video' => null,
            ],


            [
                'title' => [
                    'en' => 'Looking ahead to new community projects',
                    'mk' => 'Насочени кон нови проекти во заедницата',
                    'al' => 'Drejt projekteve të reja në komunitet',
                ],

                'short_description' => [
                    'en' => 'Multikultura is preparing new activities and projects that will bring communities closer together.',
                    'mk' => 'Мултикултура подготвува нови активности и проекти кои ќе ги зближат заедниците.',
                    'al' => 'Multikultura po përgatit aktivitete dhe projekte të reja që do t’i afrojnë komunitetet.',
                ],

                'detailed_description' => [
                    'en' => 'New projects are being prepared with the goal of creating additional opportunities for cooperation and participation. The upcoming activities will focus on community engagement, education and cultural exchange.',
                    'mk' => 'Се подготвуваат нови проекти со цел создавање дополнителни можности за соработка и учество. Претстојните активности ќе бидат насочени кон ангажман во заедницата, образование и културна размена.',
                    'al' => 'Po përgatiten projekte të reja me qëllim krijimin e mundësive shtesë për bashkëpunim dhe pjesëmarrje. Aktivitetet e ardhshme do të fokusohen në angazhimin e komunitetit, edukimin dhe shkëmbimin kulturor.',
                ],

                'date' => '2026-07-28',
                'image' => null,
                'video' => null,
            ],

        ];

        foreach ($news as $item) {
            News::create($item);
        }    }
}
