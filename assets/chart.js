
let path = $('#urls').data('path');

let datas = [];


function generate(datas){

    let labels = [];

    datas.forEach(element => {
        labels.push(element.startAt);
    })

    const data = {
        labels: labels,
        datasets: [{
            label: 'data 1',
            data: labels.map((curfent, index) => {
                console.log(datas[index].open + " ----- " + datas[index].close);
                return [datas[index].open, datas[index].close];
            }),
            backgroundColor: labels.map((curfent, index) => {
                if(datas[index].open > datas[index].close){
                    return 'rgba(255, 0, 0, 1)';
                }
                return 'rgba(0, 255, 0, 1)';
            })
        }]

    };


    let config = {
        type: 'bar',
        data: data,
        options: { scales: { y: { min: 18000 } } }

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
