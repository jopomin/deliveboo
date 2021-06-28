@extends('layouts.app')


@section('content')
<div class="about_main_cont">
    <div class="about_header">
        <h1>Il team di Deliveboo</h1>
        <p class="about_text"><strong>Deliveboo</strong> è un sito web sviluppato dal 'Team 5 - Classe 26' come progetto finale del corso intensivo per Full Stack Web Developers di Boolean Careers. <strong>Linguaggi/framework utilizzati:</strong> HTML, CSS, Vue.js, Laravel. Passando sulle schede dei singoli componenti del team si può accedere ai relativi profili Linkedin e GitHub.</p>
    </div>
    <div class="devs_card_cont">
        <div class="devs_card">
            <div class="devs_card_pic">
                <img src="{{asset('img/devs/andrea-ligorio.jpg')}}" alt="andrea-ligorio">
                <div class="devs_card_overlay">
                    <div class="devs_card_ov_icons">
                        <a href="https://www.linkedin.com/in/andrea-ligorio-964862213/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/andrealigorio" target="_blank"><i class="fab fa-github-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="devs_card_text">
                <h2>Andrea Ligorio</h2>
            </div>
        </div>
        <div class="devs_card">
            <div class="devs_card_pic">
                <img src="{{asset('img/devs/jorge-lopez-quiroz.jpg')}}" alt="jorge-lopez-quiroz">
                <div class="devs_card_overlay">
                    <div class="devs_card_ov_icons">
                        <a href="https://www.linkedin.com/in/jorge-fabrizio-lopez-quiroz/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/Jgio5" target="_blank"><i class="fab fa-github-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="devs_card_text">
                <h2>Jorge Lopez Quiroz</h2>
            </div>
        </div>
        <div class="devs_card">
            <div class="devs_card_pic">
                <img src="{{asset('img/devs/giovanni-porcelli.jpg')}}" alt="giovanni-porcelli">
                <div class="devs_card_overlay">
                    <div class="devs_card_ov_icons">
                        <a href="https://www.linkedin.com/in/giovanniporcelliminervini/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/jopomin" target="_blank"><i class="fab fa-github-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="devs_card_text">
                <h2>Giovanni Porcelli</h2>
            </div>
        </div>
        <div class="devs_card">
            <div class="devs_card_pic">
                <img src="{{asset('img/devs/dario-tedeschi.jpg')}}" alt="dario-tedeschi">
                <div class="devs_card_overlay">
                    <div class="devs_card_ov_icons">
                        <a href="https://www.linkedin.com/in/dario-tedeschi-900b54214/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/Redh86" target="_blank"><i class="fab fa-github-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="devs_card_text">
                <h2>Dario Tedeschi</h2>
            </div>
        </div>
        <div class="devs_card">
            <div class="devs_card_pic">
                <img src="{{asset('img/devs/federico-dalessio.jpg')}}" alt="federico-dalessio">
                <div class="devs_card_overlay">
                    <div class="devs_card_ov_icons">
                        <a href="https://www.linkedin.com/in/federico-d%E2%80%99alessio-052270213/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/dalessio-federico" target="_blank"><i class="fab fa-github-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="devs_card_text">
                <h2>Federico d'Alessio</h2>
            </div>
        </div>
    </div>
</div>
@endsection