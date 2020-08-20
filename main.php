<?php  header("Content-type: text/css");  ?>

html {
     background: rgb(189, 189, 189);
}

#map {
  height: 350px;
  width: 80%;
}

confirmation {
  font-size: 48px;
  text-align:center;
  font-weight: bold;
}

.header {
     background-color: rgb(14, 41, 219);
     margin-top: -10px;
     height: 60px;
     width: auto;
     overflow: visible;
     margin-left: -10px;
     margin-right: -10px;
     margin-bottom: 10px;
}

.header a {
  float: left;
  font-size: 20px;
  color: white;
  text-align: center;
  padding: 10px 8px 8px 8px;
  text-decoration: none;
}

.dropdown {
  float: left;
}

.dropbtn {
}

.dropdown-content {
  display: none;
  margin-top: 30px;
  position: absolute;
  background-color: rgb(233, 161, 51);
  min-width: inherit;
  z-index: 1;

  border: 2px solid transparent;
  -webkit-border-top-left-radius: 8px;
  -moz-border-radius-topleft: 8px;
  border-top-left-radius: 8px;
  -webkit-border-top-right-radius: 8px;
  -moz-border-radius-topright: 8px;
  border-top-right-radius: 8px;
  -webkit-border-bottom-right-radius: 8px;
  -moz-border-radius-bottomright: 8px;
  border-bottom-right-radius: 8px;
  -webkit-border-bottom-left-radius: 8px;
  -moz-border-radius-bottomleft: 8px;
  border-bottom-left-radius: 8px;
}

.dropdown-content a {
  float: none;
  color: white;
  font-size: 18px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.udropdown {
}

.udropbtn {
}

.udropdown-content {
  display: none;
  margin-top: 40px;

  position: absolute;
  background-color: rgb(233, 161, 51);
  min-width: auto;
  width: 125px;
  z-index: 1;

  border: 2px solid transparent;
  -webkit-border-top-left-radius: 8px;
  -moz-border-radius-topleft: 8px;
  border-top-left-radius: 8px;
  -webkit-border-top-right-radius: 8px;
  -moz-border-radius-topright: 8px;
  border-top-right-radius: 8px;
  -webkit-border-bottom-right-radius: 8px;
  -moz-border-radius-bottomright: 8px;
  border-bottom-right-radius: 8px;
  -webkit-border-bottom-left-radius: 8px;
  -moz-border-radius-bottomleft: 8px;
  border-bottom-left-radius: 8px;
}

.udropdown-content a {
  color: white;
  font-size: 16px;
  display: block;
  text-align: left;
  padding: 5px 5px 5px 5px;
    margin-right: 20px;
}

.udropdown:hover .udropdown-content {
  display: block;
}

.header_links {
     top: 0;
     right: 0;
     display: inline-flex;
     color: white;
}

.borderButtons a{
  border: 2px solid transparent;
  -webkit-border-top-left-radius: 8px;
  -moz-border-radius-topleft: 8px;
  border-top-left-radius: 8px;
  -webkit-border-top-right-radius: 8px;
  -moz-border-radius-topright: 8px;
  border-top-right-radius: 8px;
  -webkit-border-bottom-right-radius: 8px;
  -moz-border-radius-bottomright: 8px;
  border-bottom-right-radius: 8px;
  -webkit-border-bottom-left-radius: 8px;
  -moz-border-radius-bottomleft: 8px;
  border-bottom-left-radius: 8px;
  color: white;
  text-decoration: none;
  margin-right: 5px;
}

header_text a{
  margin-top: -5px;
}

header_text:hover a{
  text-decoration: underline;
  cursor: pointer;
}

gheader_text a{
  margin-top: 8px;
}

gheader_text:hover a{
  text-decoration: underline;
  cursor: pointer;
}

gheader_text1 a{
  margin-top: 8px;
}

gheader_text1:hover a{
  cursor: default;
}

userText{
  margin-top:20px;
  color: white;
  font-weight: normal;
  font-size: 10px;
}

h1 {
     padding-top: 20px;
     margin-bottom: 10px;
     color: white;
     text-align: center;
     font-style: italic;
     font-size: 60px;
     font-family: Chalkduster, fantasy;
}

h3 {
     margin-top: 0;
     color: white;
     text-align: center;
     font-weight: normal;
     font-size: 24px;
}

input {
     position: relative;
     text-align: center;
}

.image {
     margin-top: -42px;
     height: 400px;
     width: auto;
     background-image: url("tailgateimage.jpg");
     background-size: cover;
     margin-left: -10px;
     margin-right: -10px;
}

form {
     display: inline-flex;
     text-align: center;
}

h2 {
     margin-top: 20px;
     margin-right: 80px;
     margin-left: 40px;
     width: 100%;
     color: rgba(11, 44, 175, .93);
     text-align: right;
     font-size: 28px;
     font-family: Helvetica, Arial, sans-serif;
}

.footer {
     display: inline-block;
     margin-top: 30;
     padding-top: 5;
     width: 100%;
     height: inherit;
     background-color: black;
     vertical-align: middle;
     text-align: center;
     margin-left: -10px;

     position: fixed;
}

h6 {
     color: white;
}

.search-wrapper {
     margin-top: -120px;
}


#addressInput {
     margin: 0;
     font-size: 16px;
     padding: 8px 15px;
     width: 400px;
     border: 0 solid #dbdbdb;

     -webkit-border-top-left-radius: 10px;
     -moz-border-radius-topleft: 10px;
     border-top-left-radius: 10px;
     -webkit-border-bottom-left-radius: 10px;
     -moz-border-radius-bottomleft: 10px;
     border-bottom-left-radius: 10px;
     background-color: white;
}

#radiusSelect {
     margin-left: 0;
     font-size: 16px;
     width: auto;
     background-color: white;
     text-align: center;
     background-color: rgb(145, 35, 20);
     color: #fafafa;
}



.submit {
     margin-left: -1px;
     font-size: 16px;

     padding: 6px 15px;
     border: 2px solid #207cca;
     -moz-border-radius-topright: 10px;
     border-top-right-radius: 10px;
     -webkit-border-bottom-right-radius: 10px;
     -moz-border-radius-bottomright: 10px;
     border-bottom-right-radius: 10px;
     background-color: #207cca;
     color: #fafafa;

     webkit-border-top-right-radius: 10px;
}

.button:hover {
     background-color: #fafafa;
     color: #207cca;
}

.lower {
     margin-top: 100px;
     width: 90%;
     height: 100%;
}

.pageTitle {
  text-align: center;
}

pgtitle {
  color: white;
  font-weight: bold;
  font-size: 65px;
  font-family: monospace;
  text-align: center;
}

.pageText {
     text-align: center;
}

a.icon {
  margin-left: 0px;
  color: white;
  text-decoration: underline;
  font-size: 45px;
  font-family: Bradley Hand, cursive;
  padding-top: 0px;
}


formtext {
     margin-top: 10px;
     color: black;
     text-align: left;
     font-size: 18px;
}

input.renterForm:focus {
     outline: none;
}

input.renterForm {
     margin: 10px;
     width: 250px;
     border: none;
     border-bottom: 1px solid rgb(153, 153, 153);
     background-color: transparent;
     font-size: 15px;
}

renterform {
     margin: 10px;
     padding: 10px;
     background-color: transparent;
}

p1 {
     font-size: 10px;
     font-weight: bold;
     text-decoration: none;
}

dashText {
     text-align: center;
     font-weight: bold;
     font-size: 20px;
}

successWords {
  color: white;
  font-size: 42px;
  font-weight: bold;
}

.dashHeader {
  top: 0;
  right: 10;
  display: inline-flex;
  color: white;
}

dashHeader {
  font-size: 20px;
}

searchResult {
  font-size: 20px;
  color: black;
  text-align:center;
}

.resultPageSearchBar {
  background-color:rgb(189, 189, 189);
  padding-top: 5px;
  margin-top: -10px;
}

#map {
  height: 400px;
}

#locationSelect {
  width: 160px;
  height: 30px;
}

#table {
  float: left;
  width: 75px;
}

.table {
  background-color:rgb(189, 189, 189);
  text-align:center;
  }

.guestPropTable {
  text-align: center;
  background-color: transparent;
  border-collapse: collapse;
}

guestTableText {
  font-size: 20px;
  font-weight: bold;
}

.guestPropTable {
  width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
  align-content: center;
  text-align: center;
}

.guestPropTable th,
.guestPropTable td {
  padding: 0.5rem;
  vertical-align: top;

}

.guestPropTable thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.guestPropTable tbody + tbody {
  border-top: .5px solid #dee2e6;
}

.guestPropTable .guestPropTable {
  background-color: #fff;
}

resultCity {
  margin-top:-10px;
  font-size: 36px;
  font-weight:bold;
  background:rgb(189, 189, 189);
}

.roundButtons {
  border: 2px solid transparent;
  -webkit-border-top-left-radius: 10px;
  -moz-border-radius-topleft: 10px;
  border-top-left-radius: 10px;
  -webkit-border-top-right-radius: 10px;
  -moz-border-radius-topright: 10px;
  border-top-right-radius: 10px;
  -webkit-border-bottom-right-radius: 10px;
  -moz-border-radius-bottomright: 10px;
  border-bottom-right-radius: 10px;
  -webkit-border-bottom-left-radius: 10px;
  -moz-border-radius-bottomleft: 10px;
  border-bottom-left-radius: 10px;
  height: 40px;
  font-size: 15px;

  padding: 10px;
}

.roundButtons:hover {
  cursor: pointer;
  text-decoration: underline;
  background: rgb(233, 161, 51);
}

logoutText {
  font-size: 36px;
  font-weight: bold;
}

.propertyDetails {
    float: left;
    margin-top: 225px;
}

propertyText {
  font-size: 18px;

}

.btn-link {
  border:none;
  outline:none;
  background:none;
  cursor:pointer;
  color:#0000EE;
  padding:0;
  text-decoration:underline;
  font-family:inherit;
  font-size:inherit;
}
