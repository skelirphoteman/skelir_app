/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import Chart from 'chart.js/auto';

const $ = require('jquery');

let path = $('#urls').data('path');

let datas = [];


function generate(datas){
    console.log(datas);
    const labels = ['1','1', '1', '1', '1', '1', '1'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'data 1',
            data: labels.map((curfent, index) => {
                console.log(datas[index].open + " ----- " + datas[index].close);
                return [21000, 22000];
            }),
            backgroundColor: 'rgba(0, 0, 255, 1)'
        }]
    };


    const config = {
        type: 'bar',
        data: data,
        scales: {
            y: {
                    min: 1500,
                    max: 2100,
            }
        }
    };


    new Chart(document.getElementById("line-chart"), config);

}



$.ajax({
    url: path,
    success: (data) => {
        let datas = $.parseJSON(JSON.stringify(data));

        generate(datas);
    }
});
