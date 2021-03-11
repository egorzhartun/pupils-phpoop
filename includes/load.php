<?php
session_start();
require_once('./class/Pupil.php');
$pupil = new Pupil("localhost", "root", "root", "pupils");
$bais = new Bias("localhost", "root", "root", "pupils");