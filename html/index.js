'use strict';
var express = require('express');
var router = express.Router();

var sqlite3 = require('sqlite3').verbose();
var file = "tr5nr.sqlite";
var db = new sqlite3.Database(file);

db.all("SELECT * FROM estacion", function(err, rows) {
        rows.forEach(function (row) {
            console.log(row.codigo);
        })
	});
db.close();
