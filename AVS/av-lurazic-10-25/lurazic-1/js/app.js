function closePop() {
    document.getElementById('btn-close').style.display = 'none';

    document.getElementById('pop1-bullet1').classList.remove('runBullet1');
    document.getElementById('pop1-bullet2').classList.remove('runBullet2');
    document.getElementById('pop1-bullet3').classList.remove('runBullet3');

    document.getElementById('pop2-bullet1').classList.remove('runBullet1');
    document.getElementById('pop2-bullet2').classList.remove('runBullet2');
    document.getElementById('pop2-bullet3').classList.remove('runBullet3');
    document.getElementById('pop2-bullet4').classList.remove('runBullet4');
    document.getElementById('pop2-bullet5').classList.remove('runBullet5');

    document.getElementById('pop3-bullet1').classList.remove('runBullet1');
    document.getElementById('pop3-bullet2').classList.remove('runBullet2');
    document.getElementById('pop3-bullet3').classList.remove('runBullet3');
  
    document.getElementById('pop1').style.display = 'none';
    document.getElementById('pop2').style.display = 'none';
    document.getElementById('pop3').style.display = 'none';
}

function openPop(pop) {
    document.getElementById(pop).style.display = 'block';
    document.getElementById('btn-close').style.display = 'block';
    
    document.getElementById('pop1-bullet1').className += 'runBullet1';
    document.getElementById('pop1-bullet2').className += 'runBullet2';
    document.getElementById('pop1-bullet3').className += 'runBullet3';

    document.getElementById('pop2-bullet1').className += 'runBullet1';
    document.getElementById('pop2-bullet2').className += 'runBullet2';
    document.getElementById('pop2-bullet3').className += 'runBullet3';
    document.getElementById('pop2-bullet4').className += 'runBullet4';
    document.getElementById('pop2-bullet5').className += 'runBullet5';

    document.getElementById('pop3-bullet1').className += 'runBullet1';
    document.getElementById('pop3-bullet2').className += 'runBullet2';
    document.getElementById('pop3-bullet3').className += 'runBullet3';

}

function anima_pack (){
    var d = document.getElementById('pack');
    d.className += 'run_pack';
}