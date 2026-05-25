@extends('front.layouts.main')

@section('title', 'Activity')

@section('content')
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center"
            style="background: url({{ asset('assets/content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/profile.jpg') }}) 100% 100%">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">{{ $currentActivity->first()->name }}</h1>
            </div>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!--- Activity Details -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h4><strong> {{ $currentActivity->first()->name }} </strong></h4>
                    <p><i class="fa fa-envelope"></i> <a href='mailto:{{ $currentActivity->first()->email }}'
                            target="_top"> {{
                            $currentActivity->first()->email }} </a></p>
                    <h2 class="card-title h4">Story</h2>
                    <p class="card-text">{{ $currentActivity->first()->story }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title h4">Event Details</h2>
                    <p class="card-text">{{ $currentActivity->first()->story }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title h4">COMICS FROM THE MIDDLE EAST AND BEYOND</h2>
                    <h3>Comics Exhibition, Talks and Workshops</h3>
                    <h3>In </h3>
                    <h3 style="color: #fcd116;">Malmö, <strong style="color: #005b99;">Sweden</strong></h3>
                    <p>During October, Historielabbet invites Koshk Comics from Egypt to Malmö to show comics from the
                        region. Malmö is
                        known as the “comic capital of Sweden” and now the artists from Koshk have the opportunity to
                        show their works here.
                        During October, talks and workshops will be held at Malmö Konsthall and the comics will be shown
                        around Malmö.</p>
                    <p>In partnership with Historielabbet Handelsbolag, Kulturstråket Malmö, and the folkuniversitet
                        Malmö/Lund.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <img class="card-img-top"
                    src="{{ asset('assets/content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/exhibition.jpg') }}"
                    alt="..." />
                <div class="card-body">
                    <h2 class="card-title h4">The WWIII Exhibition at Malmo Stadsbibliotek, and Garaget</h2>
                    <p>World War III is an exhibition of new works, created to be shown in Malmö. The comics are
                        selected by the comic
                        platform Koshk Comics. Koshk allows Arabic comic artists to publish their works through a
                        digital app instead of
                        publishing houses. This is due to the strict rules for publishing in Egypt and the rest of the
                        region.</p>

                    <p>The exhibition contains works of satire and reflection where artists problematize contemporary
                        society and global
                        politics with comics as a medium. Comics allows for the hardest topics to become easy and the
                        darkest ones to be
                        humorous. Therefore, here are a number of artists whose comics discuss both daily life
                        experiences as well as major
                        political events. </p>

                    <p>Koshk is invited by the organization Historielabbet – Gör om! Gör rätt! in order to expand the
                        comic scene in Malmö
                        with more artistic expressions and stories. With their initiative Koshk tries to provide a
                        platform to the political
                        voices that exist, but are not always heard. Through this invitation Koshk’s artists are able to
                        exhibit their
                        stories to new readers and to find new users for the app in Malmö, known as “comic capital of
                        Sweden.”
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <img class="card-img-top"
                    src="{{ asset('assets/content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/8oct.jpg') }}"
                    alt="..." />
                <div class="card-body">
                    <h2 class="card-title h4">Series, Society and Censorship!</h2>
                    <p>How do different mediums and technical invations enable the publication of opinions? What can art
                        and literature do
                        for freedom of speech? How does censorship affect artistic practice? Explore different aspects
                        of art in the
                        political game in a talk with Magnus Nilsson (prof. in literary studies) and the comic network
                        Koshk Comics from
                        Egypt. Through their digital platform Koshk allows comic artist in the region to publish their
                        works despite strict
                        censorship. The talk is given in English and is organized by Kunskapsklubben, Folkuniversitetet.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <img class="card-img-top"
                    src="{{ asset('assets/content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/15oct.jpg') }}"
                    alt="..." />
                <div class="card-body">
                    <h2 class="card-title h4">Workshop at Malmö Konsthall for children and young people. With Koshk
                        Comics and Tusen Serier</h2>
                    <p>Koshk Comics team is having a workshop together with the comic organisation in Malmö – Tusen
                        Serier. It’s an open,
                        drop-in workshop, so every age could come! Open workshop for children and young people with
                        Koshk Comics from Egypt
                        and Tusen Serier from Malmö.
                    </p>

                    <p>What language do you speak? Come and create comics in Swedish, English and Arabic. Together with
                        Koshk Comics and
                        Tusen Serier you get the opportunity to try to create your own character, your own comic-strip
                        and make your own
                        fanzine.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <img class="card-img-top"
                    src="{{ asset('assets/content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/18oct.jpg') }}"
                    alt="..." />
                <div class="card-body">
                    <h2 class="card-title h4">Workshop at Malmö Konsthall for comic artists With Koshk Comics and Tusen
                        Serier</h2>
                    <p>Are you interested in comics? Perhaps already published or maybe you just started working on your
                        own fanzine?
                        Welcome to a workshop together with Koshk Comics from Egypt and Tusen Serier from Malmö about
                        self-publishing and
                        comic-making.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
