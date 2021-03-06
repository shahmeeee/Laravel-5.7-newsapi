<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>News</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <style>
        .form-group {
            margin-left: 10px;
        }
        .refreshDiv{
            margin: 10px;
        }

        @import url(https://fonts.googleapis.com/css?family=Oswald:400,300,700);
        @import url(https://fonts.googleapis.com/css?family=Abel);

        body.opened, html.opened {
            overflow: hidden;
            position: relative;
            height: 100%;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        ul.newslinks a {
            text-decoration: none;
        }

        nav .newsnav {
            height: 35px;
            background: rgb(0, 85, 150);
        }

        nav .newsnav #recentnews {
            font-family: 'Abel';
            font-size: 20px;
            height: 100%;
            padding: 0 14px 0 8px;
            background: #faA634;
            color: #fff;
            float: left;
        }

        nav .newsnav #recentnews i {
            margin: 8px;
        }

        ul.newslinks {
            float: right;
        }

        .newslinks a {
            float: left;
            padding: 6px 10px 0 10px;
            color: #fff;
            font-family: 'Abel';
            font-size: 16px;
            height: 35px;
            position: relative;
            transition: color .3s ease-in-out;
        }

        .newslinks a:hover {
            color: #faA634;
            text-decoration: none;
        }

        .newslinks a:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            display: block;
            height: 2px;
            width: 0;
            background: #faA634;
            transition: width .3s ease-in-out;
        }

        .newslinks a:hover:after {
            width: 100%;
        }

        .newslinks a.more-links {
            display: none;
        }

        .newsnav .search {
            background: #faA634;
            padding: 5px 16px;
            width: 80px;
            height: 35px;
            float: right;
            color: #fff;
            font-family: 'Abel';
            font-size: 18px;
            cursor: pointer;
        }

        .newsnav .search:hover {
            color: rgb(0, 85, 150);
        }

        nav .searchnav {
            height: 0;
            overflow: hidden;
            background: #faA634;
            transition: height .3s ease-in-out;
        }

        nav .searchnav ul {
            float: right;
            display: block;
        }

        nav .searchnav li {
            color: #fff;
            float: left;
            padding: 7px 8px 0 8px;
            height: 35px;
            cursor: pointer;
            position: relative;
            transition: color .3s ease-in-out;
            font-family: 'Abel';
            font-size: 16px;
        }

        nav .searchnav li:hover {
            color: rgb(0, 85, 150);
        }

        nav .searchnav li:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            display: block;
            height: 2px;
            width: 0;
            background: rgb(0, 85, 150);
            transition: width .3s ease-in-out;
        }

        nav .searchnav li:hover:after {
            width: 100%;
        }

        nav .searchnav li.close-search {
            font-size: 18px;
            padding: 5px 12px;
        }

        nav .searchnav li.close-search:after {
            display: none;
        }

        nav .searchnav li.search-field {
            font-family: sans-serif;
            font-size: 12px;
            color: #000;
        }

        nav .searchnav li.search-field:hover {
        }

        nav .searchnav li input {
            height: 80%;
            border: none;
            padding: 0 5px 0 5px;
            width: 400px;
        }

        nav .searchnav li.search-field:after {
            display: none;
        }

        nav .searchnav.opened {
            height: 35px;
        }

        .archive {
            display: block;
            padding-top: 15px;
            position: absolute;
            z-index: 6000;
            background: #fff;
            height: 0;
            overflow: hidden;
            left: 0;
            transition: height .4s ease-in-out;
            width: 100%;
        }

        .archive.opened {
            height: 370px;
        }

        .archive #active-article .contain {
            min-height: 50px;
            max-height: 250px;
            overflow: hidden;
        }

        .archive #active-article img {
            width: 100%;
        }

        .archive #active-article .info p {
            margin-top: 6px;
        }

        ul#archive-list {
            font-family: 'Oswald';
            font-size: 16px;
            height: 350px;
            overflow: scroll;
            overflow-x: hidden;
        }

        #archive-list li {
            padding: 5px;
            color: #002743;
        }

        #archive-list #date {
            color: rgb(0, 85, 150);
            display: inline-block;
            margin-right: 6px;
        }

        #archive-list li:hover #date {
            color: #fff;
        }

        #archive-list #title {
            display: inline-block;
        }

        #archive-list li:hover {
            background: rgb(0, 85, 150);
            color: #fff;
        }

        #archive-list #date.new {
            color: #faA634;
        }

        #archive-list:hover #date.new {
            color: #faA634;
        }

        article.style1 {
            position: relative;
            height: auto;
            min-height: 150px;
            overflow: hidden;
            margin-top: 15px;
        }

        article img {

            width: 100%;
            z-index: 2;
            margin: 0 0 0 0;
            filter: grayscale(100%);
            transition: transform .4s ease-in-out, margin .4s ease-in-out, filter .4s ease-in-out;
        }

        article img.show {
            opacity: 1;
        }

        article .loader {
            position: absolute;
            left: calc(50% - 25px);
            top: calc(50% - 25px);
            color: rgb(0, 85, 150);
            font-size: 50px;
            z-index: 0;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        article.style1:hover img {
            margin: 0 0 0 0%;
            transform: scale(1.15);
            filter: grayscale(0%);
        }

        article.style1 .date {
            position: absolute;
            z-index: 3;
            left: 0;
            width: 100px;
            height: 30px;
            background: #faA634;
            font-family: 'Oswald';
            font-style: normal;
            font-size: 18px;
            text-transform: uppercase;
            text-align: center;
            color: #fff;

        }

        article.style1 .date.old {
            padding-top: 2px;
            background: rgb(0, 85, 150);
        }

        article.style1 .date.old:before {
            font-size: 14px;
        }

        article.style1 .content {
            position: absolute;
            height: auto;
            width: 100%;
            bottom: 0;
            left: 0;
            z-index: 4;
        }

        article.style1 .title {
            bottom: 0;
            left: 0;
            width: 100%;
            height: 70px;
            background: rgba(0, 85, 150, .75);
            font-family: 'Oswald';
            font-style: normal;
            font-size: 14px;
            text-align: left;
            padding: 5px;
            color: #fff;
            transition: background .4s ease-in-out;
        }

        article.style1:hover .title {
            background: rgba(0, 85, 150, 1);
        }

        article.style1 i.share {
            position: absolute;
            right: 0;
            font-size: 18px;
            padding: 2px 8px;
            transition: all .2s ease-in-out;
        }

        article.style1 i.share:hover {
            color: #faA634;
        }

        article.style1 .info {
            bottom: 0;
            left: 0;
            width: 100%;
            max-height: 0;
            background: #faA634;
            text-align: left;
            overflow: hidden;
            transition: max-height .3s ease-in-out, color .4s ease-in-out;
        }

        article.style1 .info p {
            padding: 5px;
            font-family: sans-serif;
            font-style: normal;
            font-size: 12px;
            color: #fff;
        }

        article.style1:hover .info {
            max-height: 75px;
            color: #fff;
        }


        /*Style2*/

        article.style2 {
            position: relative;
            height: auto;
            min-height: 150px;
            overflow: hidden;
            margin-top: 15px;
        }

        article.style2:hover img {
            margin: 0 0 0 0%;
            transform: scale(1.15);
            filter: grayscale(0%);
        }

        article.style2 .date {
            position: absolute;
            z-index: 2;
            left: 0;
            width: 50px;
            height: 30px;
            background: #faA634;
            font-family: 'Oswald';
            font-style: normal;
            font-size: 18px;
            text-transform: uppercase;
            text-align: center;
            color: #fff;
            padding-top: 3px;
        }

        article.style2 .date.old {
            padding-top: 2px;
            background: rgb(0, 85, 150);
        }

        article.style2 .date.old:before {
            font-size: 14px;
        }

        article.style2 .content {
            position: absolute;
            height: auto;
            width: 100%;
            bottom: 0;
            left: 0;
            z-index: 3;
        }

        article.style2 .title {
            bottom: 0;
            left: 0;
            margin-left: 50px;
            width: 100%;
            height: 30px;
            background: rgba(0, 85, 150, .75);
            font-family: 'Oswald';
            font-style: normal;
            font-size: 12px;
            text-align: left;
            padding: 6px;
            color: #fff;
            transition: background .4s ease-in-out;
        }

        article.style2:hover .title {
            background: rgba(0, 85, 150, 1);
        }

        article.style2 .share {
            font-family: 'Oswald';
            position: absolute;
            right: -70px;
            top: -28px;
            padding: 2px;
            width: 70px;
            font-size: 14px;
            transition: all .2s ease-in-out;
            color: #fff;
            background: rgba(0, 85, 150, 1);
        }

        article.style2 .share i {
            margin: 5px;
            font-size: 15px;
        }

        article.style2:hover .share {
            right: 0;
        }

        article.style2 .share:hover {
            color: #faA634;
        }

        article.style2 .info {
            bottom: 0;
            left: 0;
            width: 100%;
            max-height: 0;
            background: #faA634;
            text-align: left;
            overflow: hidden;
            transition: max-height .3s ease-in-out, color .4s ease-in-out;
        }

        article.style2:hover .info {
            max-height: 75px;
            color: #fff;
        }

        article.style2 .info p {
            padding: 5px;
            font-family: sans-serif;
            font-style: normal;
            font-size: 12px;
            color: #fff;
        }

        .newsbottom {
            position: fixed;
            z-index: 1000;
            bottom: 0;
            height: 80px;
            width: 100%;
            pointer-events: none;
            background: rgba(0, 0, 0, 0);
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.43) 57%, rgba(0, 0, 0, 0.54) 71%, rgba(0, 0, 0, 0.57) 75%, rgba(0, 0, 0, 0.9) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(57%, rgba(0, 0, 0, 0.43)), color-stop(71%, rgba(0, 0, 0, 0.54)), color-stop(75%, rgba(0, 0, 0, 0.57)), color-stop(100%, rgba(0, 0, 0, 0.9)));
            background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.43) 57%, rgba(0, 0, 0, 0.54) 71%, rgba(0, 0, 0, 0.57) 75%, rgba(0, 0, 0, 0.9) 100%);
            background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.43) 57%, rgba(0, 0, 0, 0.54) 71%, rgba(0, 0, 0, 0.57) 75%, rgba(0, 0, 0, 0.9) 100%);
            background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.43) 57%, rgba(0, 0, 0, 0.54) 71%, rgba(0, 0, 0, 0.57) 75%, rgba(0, 0, 0, 0.9) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.43) 57%, rgba(0, 0, 0, 0.54) 71%, rgba(0, 0, 0, 0.57) 75%, rgba(0, 0, 0, 0.9) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#000000', GradientType=0);
        }

        .newsbottom .to-top {
            position: absolute;
            right: 15px;
            bottom: 15px;
            width: 40px;
            height: 40px;
            background: rgb(0, 85, 150);
            pointer-events: all;
            cursor: pointer;
        }

        .newsbottom .to-top i {
            color: #fff;
            font-size: 20px;
            margin: 10px;
        }

        @media (max-width: 650px) {
            .col-xxs-12 {
                width: 100%;
            }

            .hidden-xxs {
                display: none;
            }

            article.style1:hover .info, article.style2:hover .info {
                max-height: 0px;
            }

            article img {
                filter: grayscale(0%);
            }

            article.style1:hover img, article.style2:hover img {
                width: 100%;
                margin: 0 0 0 0;
            }

            article.style2 .share {
                right: 0;
            }
        }

        @media (max-width: 768px) {
            .archive #active-article {
                display: none;
            }
        }

        @media (max-width: 992px) {
            ul.newslinks {
                background: rgb(0, 85, 150);
                padding: 0 15px;
                max-height: 35px;
                overflow: hidden;
                transition: max-height .3s ease-in-out;
                position: absolute;
                right: 90px;
                z-index: 10000;
            }

            .newslinks a {
                float: none;
                background: rgb(0, 85, 150);
                padding: 0 0;
                color: #fff;
                font-family: 'Abel';
                font-size: 16px;
                height: 35px;
                position: relative;
                transition: color .3s ease-in-out;
                line-height: 35px;
            }

            ul.newslinks:hover {
                max-height: 250px;
            }

            .newslinks a.more-links {
                display: block;
            }

            .newslinks a.more-links:hover {
                color: #fff;
            }

            .newslinks a.more-links:after {
                display: none;
            }

            nav .searchnav.opened {
                height: 70px;
            }

            nav .searchnav ul {
                float: left;
                width: 100%;
            }

            nav .searchnav li.search-field {
                width: 100%;
            }

            nav .searchnav li.close-search {
                position: absolute;
                right: 12px;
            }

            nav .searchnav li.search-field input {
                width: 100%;
            }
        }

        @media (max-width: 1200px) {

        }

        @media (max-width: 1600px) {

        }
    </style>
</head>
<body>




