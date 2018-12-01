<?php
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class entregaFacukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('\App\entregaFacil');

        $dato = 0;
        while($dato <1){

         \App\entregaFacil::insert([
            'm_title'=>'entrega facíl',
            'm_description'=> $faker->sentence,
            'm_key'=>$faker->word(3),
            'canonical'=>$faker->sentence,
            'nombre'=>  'Entrega Fácil',
            'cuerpo'=> '
            Service client téléphonique Il est possible qu ́a un moment donné dans votre vie de consommateur, que vous ayez besoin de savoir qu ́il est agréable de pouvoir être accompagner lors d ́un incident technique. En effet, pour cela nous mettons en place un service téléphonique qui s ́adapte a vous. Qu ́est-ce qu ́un service client téléphonique? Vous souhaitez une prise en charge directe, mais vous ne savez pas forcement a qui vous adresser? Qu ́importe votre demande, notre service client téléphonique est a votre entière disposition pour vous accompagner lors d ́un souci technique ou juste pour vous renseigner. Notre préoccupation majeure est une réelle proximité avec nos clients et nous permet de nous renouveler sans cesse, afin de vous fournir toutes les informations dont vous avez besoin, de la demande la plus générale a la plus technique. En effet, nous formons nos équipes de professionnels par le biais de réseaux d ́agences basées un peu partout en France qui regroupe nos plate formes téléphoniques et vous permet une prise en charge personnalisée mais aussi et surtout une mise en contact facilitée. Tous les dispositifs que nous mettons en place vous donne l ́avantage de recevoir une réponse ou une solution rapide et claire, ce qui permet de renforcer la confiance que vous avez en nous car nous nous efforçons de vous satisfaire et d ́être la quand vous en avez besoin. Vous souhaitez obtenir des informations générales ? Vous avez besoin de précisions sur un service/produit en particulier? Peut-être voulez-vous juste émettre une suggestion ou même faire part d’une réclamation ? Notre service client téléphonique est donc présent pour répondre a tous vos doutes et ce, grâce a un service client qui vous accompagne. En effet, beaucoup peuvent parfois l ́oublier mais la priorité de ce type de service est de vous accompagner car il est possible que vous ayez besoin d ́être redirigé dans votre démarche d ́informations et i est important que vous soyez écouté Il est donc essentiel de pouvoir avoir confiance en notre service client téléphonique, d ́autant que ce type de service est le plus utilisé des consommateurs, il est donc important de tout miser sur la qualité de notre service client téléphonique. De plus la nature des appels est très différente selon les clients et les besoins, il est donc normal de pouvoir être capable de répondre a toute sorte de demande tout en fournissant le meilleur service client. C ́est d ́ailleurs pour toutes ces différentes raisons que nous possédons également un service qualité concernant notre service client téléphonique, ce qui vous permet a vous client de nous aider a nous améliorer sans cesse en nous faisant part éventuellement des petites défauts existants. Comment se mettre en relation directe avec le service client téléphonique? Pour se mettre en relation avec notre service client téléphonique, rien de plus facile, nous bénéficions d ́une visibilité maximale comme sur notre site officiel professionnel présent sur Internet, dans l ́annuaire des professionnels, mais aussi sur nos propres cartes de visites et flyers en tout genre, ce qui fait que vous trouverez très facilement notre numéro de téléphone directement. Si ce n ́est pas le cas, nous mettons a votre disposition le numéro de notre service client téléphonique au. Quand est-il possible de se mettre en lien avec le service client téléphonique? Sachez que notre service assistance vous est accessible par téléphone tous les jours, les dimanches et les jours fériés inclus 24h/24 et 7j/7. Ce qui vous donne la possibilité de nous contacter quand vous le souhaitez mais surtout quand vous en avez vraiment besoin. En effet, toujours dans un souci de qualité, nous pensons qu ́un service client qui fonctionne est un service qui est présent a tout moment car un incident technique ne prévient pas et arrive a tout moment et il est essentiel de pouvoir compter sur notre service client téléphonique. Avec la facilité a l ́information, notamment grâce au web , il est obligatoire de pouvoir optimiser cette transparence et cette réactivité au sein de notre service client téléphonique et c ́est pourquoi, nous vous proposons un service de haute qualité car les avis de nos clients ne tarissent pas d ́éloge, ce qui illustre bien notre engagement pour vus accompagner dans votre quotidien. Nous puisons notre force directement dans vos suggestions ou vos réclamations pour nous renouveler sans cesse car un service client téléphonique de qualité c ́est aussi un service qui vous écoute et écouter aussi vos conseils d ́amélioration. C ́est pourquoi nous organisons diverses types de formations auprès de nos équipes pour être capable d` ́évoluer en même temps que vos besoins et ainsi être plus réactif que jamais. Votre demande est l ́essence même de notre service client et votre satisfaction est notre plus grande réussite. Nos équipes de conseillers professionnels en sont conscients et c ́est notre point de cible, lors de nos formations. Vous êtes ainsi entre de bonnes mains et sur que votre demande sera traitée dans les meilleurs délais.'
        ]);


        $dato++;
    }


    }
}
