<template>
    <b-navbar id="bordermenu" toggleable="md">
        <b-navbar-brand href="https://www.odisee.be/">
            <img src="img/logo.png" alt="Logo" class="d-inline-block align-top logo">
        </b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" class="fill stroke" is-nav>
            <ul id="navbarmenu">
                <li class="nav-link"><a href="/"> Overzicht</a> </li>
                <li class="nav-link"><a href="/students"> Studenten</a> </li>
                <li class="nav-link"><a href="/archief"> Archief</a> </li>
                <li class="nav-link"><a href="/belbintest"> BELBIN test</a> </li>
                <li class="nav-link"><a href="/nieuwproject"> Nieuw project</a> </li>
            </ul>
        </b-collapse>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown right>
                <template slot="button-content" >{{user.name}} {{user.surname}}</template>
                <b-dropdown-item href="#"><a>Mijn project</a></b-dropdown-item>
                <b-dropdown-item href="#"><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a></b-dropdown-item>
            </b-nav-item-dropdown>
        </b-navbar-nav>
    </b-navbar>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                fields: [
                    {
                        key: "name",
                        html: true
                    },
                    {
                        key: "surname",
                        html: true
                    }
                ],
            };
        },
        methods:{
        }
    };
</script>

<style>
    .logo {
        width: 12rem;
        height: auto;
    }
    #navbarmenu {
        list-style: none;
        text-align: center;
        margin: 0;
    }
    #bordermenu {
        background-color: #ced9e6;
        box-shadow: 0px -5px 20px #093667;
    }
    .nav-link {
        float: left;
    }
    .nav-link a {
        display: block;
        padding: 0.5rem;
        text-decoration: none;
        font-weight: 600;
        color: #093667;
        margin: 0 0.8rem;
    }
    nav ul li a:hover {
        text-decoration: none;
    }
    .nav-li a,
    .nav-li a:after,
    .nav-li a:before {
        transition: all 0.5s;
    }
    .nav-li a:hover {
        color: #fff;
    }
    /* stroke */
    .stroke ul li a,
    .fill ul li a {
        position: relative;
    }
    .stroke ul li a:after,
    .fill ul li a:after {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 0%;
        content: ".";
        color: transparent;
        background: #093667;
        height: 1px;
    }
    .stroke ul li a:hover:after {
        width: 100%;
    }
    /* FILL */
    .fill ul li a {
        transition: all 2s;
    }

    .fill ul li a:after {
        text-align: left;
        content: ".";
        margin: 0;
        opacity: 0;
    }
    .fill ul li a:hover {
        color: #fff;
        z-index: 1;
    }
    .fill ul li a:hover:after {
        z-index: -10;
        animation: fill 1s forwards;
        -webkit-animation: fill 1s forwards;
        -moz-animation: fill 1s forwards;
        opacity: 1;
    }
    /* Keyframes */
    @-webkit-keyframes fill {
        0% {
            width: 0%;
            height: 1px;
        }
        50% {
            width: 100%;
            height: 1px;
        }
        100% {
            width: 100%;
            height: 100%;
            background: #093667;
        }
    }
    @keyframes fill {
        0% {
            width: 0%;
            height: 1px;
        }
        50% {
            width: 100%;
            height: 1px;
        }
        100% {
            width: 100%;
            height: 100%;
            background: #093667;
        }
    }
    @-moz-keyframes fill {
        0% {
            width: 0%;
            height: 1px;
        }
        50% {
            width: 100%;
            height: 1px;
        }
        100% {
            width: 100%;
            height: 100%;
            background: #093667;
        }
    }

    /* MEDIA QUERYS */
    @media (max-width: 767px) {
        .nav-link {
            float: none;
        }
        .logo {
            margin-right: 9rem;
        }
    }
</style>
