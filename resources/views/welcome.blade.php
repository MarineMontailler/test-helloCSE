<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test HelloCSE - Laravel </title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/general.css') }}" rel="stylesheet">
        
    </head>
    <body>
        
        <section id="app">
            <div>
                <h1>Book de stars</h1>
                <div class="card-container">
                    <div class="card-top">
                        <div class="photo-container">
                            <img src="https://resize-elle.ladmedia.fr/r/625,,forcex/crop/625,804,center-middle,forcex,ffffff/img/var/plain_site/storage/images/people/la-vie-des-people/news/angelina-jolie-et-son-fils-knox-leon-complices-dans-les-rues-de-los-angeles-3893808/94103021-1-fre-FR/Angelina-Jolie-et-son-fils-Knox-Leon-complices-dans-les-rues-de-Los-Angeles.jpg" alt="photo" />
                        </div>
                        <h2 class="card-title">Angelina Jolie</h2>
                    </div>
                    <div class="card-bottom">
                        <p>The first drawback of anger is that it destroys your inner peace; the second is that it distorts your view of reality. If you think about this and come to understand that anger is really unhelpful, that it is only destructive, you can begin to distance yourself from anger.</p>
                        <p>It is clear that feelings of love, affection, closeness and compassion bring happiness. I believe that every one of us has the means to be happy, to access the warm and compassionate states of mind that bring happiness. In fact, it is one of my fundamental beliefs that not only do we inherently possess the potential for compassion, but I believe that the basic or underlying nature of human beings is gentleness.</p>
                    </div>
                    
                </div>
            </div>
            <example-component></example-component>

        </section>
        <script src="{{ asset('js/app.js') }}" ></script>
    </body>
</html>
