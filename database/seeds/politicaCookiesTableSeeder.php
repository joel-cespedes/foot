<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class politicaCookiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { $faker = Faker::create('\App\politicaCookie');

        $dato = 0;
        while($dato <1){

            \App\politicaCookie::insert([
                'm_title'=> $faker->sentence,
                'm_description'=> $faker->sentence,
                'm_key'=>$faker->word(3),
                'canonical'=>$faker->sentence,
                'nombre'=>  'politique de cookies',
                'cuerpo'=> 'Le service client sur les réseaux sociaux

Un service client qui s ́adapte au mode de vie des clients
A l ́heure actuelle, dans un univers ultra connecté, les réseaux sociaux font partie de la vie
quotidienne de tout le monde, c ́est pourquoi nous pensons que c ́est important de pouvoir
assurer la relation de notre service client, a travers ces mêmes réseaux.
Vous n ́êtes pas sans savoir donc, que de plus en plus, de consommateurs privilégient ce
moyen de communication, que ce soit pour poser des questions générales, pur nous faire part
d’une réclamation et même pour nous transmettre des suggestions pertinentes. Ce support
vous donne l ́opportunité de nous contacter quand vous le souhaitez et ce, de façon efficace et
immédiate.
Que ce soit sur Facebook, Twitter, Instagram, SnapChat ou encore Google+, vous pouvez
formuler vos demandes de la façon la plus simple et confortable possible, tout en étant a votre
portée car aujourd’hui la plupart de nos clients sont membres d ́au moins un réseau social, ce
qui nous assure un accès plus que facilité et aussi une visibilité maximale.
Les réseaux sociaux, une alternative efficace pour le service client
Face au service traditionnel de service client tel que le téléphone ou le courrier, les réseaux
sociaux prennent une part de plus en plus importante et pour les consommateurs, cela permet
aussi une prise en charge directe, sans négliger la qualité.
De la même façon qu ́un service client accessible par téléphone ou par courrier, notre service
client vous assure une qualité de service optimale et une prise en charge sérieuse, rigoureuse
et professionnelle.
Nous contacter sur les réseaux sociaux vous offre finalement que des avantages car ça permet
de renforcer la relation entre le client et l ́entreprise, le traitement des demandes étant traitée de
la même manière que sur d ́autres supports. L ́avantage étant que lorsqu ́un client est pris en
charge par nos services et qu ́il est satisfait, il est plus susceptible de recommander la marque.
Assurer un service client sur les réseaux sociaux est plus populaire que jamais car nos clients
peuvent utiliser les réseaux sociaux que ce soit a des fins personnels mais aussi pour
demander de l ́aide et face a une demande de plus en plus grande, nous nous rendons plus
accessibles.

Les bons points du service clientèle sur les réseaux sociaux
Les réseaux sociaux c ́est le support phare que les consommateurs aiment utiliser pour son
cote pratique et facile d ́accès pour solliciter un service client. En effet, le client gagne du temps
car il n ́a pas a prévoir un certain temps pour patienter au téléphone ni a écrire un courrier
détaillé et de devoir l ́envoyer.
Nous sommes conscients que nos clients ont une vie bien chargée et donc l ́objectif étant de
faciliter chaque démarche pour être le plus proche de nos clients et leur permettre un accès
confortable et optimisé.
En effet, les réseaux sociaux permettent une communication directe mais aussi personnalisée
car nous formons nos conseillers du service client pur être réactif et vous accompagner
personnellement sans passer par plusieurs agents et devoir expliquer de nouveau votre
demande.

Ensuite, les demandes étant de plus en plus nombreuses, les réseaux sociaux nous permettent
de mieux traiter la quantité de toutes vos demandes en déployant un service qui s ́adapte en
toute circonstance.
De plus, les services clients téléphoniques par exemple, sont très souvent saturés par la
quantité des consommateurs et donc grâce a ce support, nous sommes plus a même de traiter
vos requêtes plus rapidement et ainsi vous aider réellement.
Les réseaux sociaux permettent aussi une interaction directe et facilitée entre la société et le
client, ce qui renforce le relation et la confiance, ce comportement vise avant tout a changer l
 ́image des services clients qui sont parfois réputés comme inaccessibles ou même inefficaces
car certains ignorent out simplement les demandes, quand celles-ci sont délicates ou
complexes.
Les réseaux sociaux permettent aussi d’assurer un suivi clientèle direct et d’agir de manière
proactive pour savoir si nos clients sont satisfaits. Ce support permet aussi de donner une réelle
identité de notre société en étant dynamiques mais aussi et surtout soucieux de la relation
facilitée entre le client et notre entité.
Un client satisfait aura forcément tendance a vous recommander sur les réseaux sociaux et
comme plus de 26 millions de personnes sont présents sur les réseaux sociaux dans le monde,
les retombées en terme de publicité et de visibilité sont décuplées et donc vont nous valoriser
encore plus car c ́est public.
Notre service client est représenté sur les réseaux sociaux, ce qui améliore donc la
performance de notre activité mais aussi et surtout de la gestion de vos demandes car comme
nous l ́avons expliqués précédemment, les clients sont de plus en plus nombreux mais leurs
demandes également.
Enfin, grâce a un accès facilité, l ́impact du service client sera plus grand et la société en est
renforcée car proactive, elle est omniprésente.'
            ]);


            $dato++;
        }
    }
}
