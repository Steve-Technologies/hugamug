const colors = {
    colorPrimary: "#e4c590",
    colorDanger: "#da0a1c",
    colorSuccess: "#04a447",
    colorWarning: "#ffbb55",
    colorWhite: "#fff",
    colorInfoDark: "#7d8da1",
    colorInfoLight: "#dce1eb",
    colorDark: "#363949",
    colorLight: "#848bc82e",
    colorPrimaryVariant: "#111e88",
    colorDarkVariant: "#677483",
    colorBackground: "#f6f6f9",
    colorCancelled: "#969696",
    colorDining: "#0786b0"
  };
  
  



const chart = document.querySelector('#chart').getContext('2d');

//new chart instance
const chartobj = new Chart(chart,{
    type : 'bar',
    options : {
        plugins : {
            legend : {
                position : 'bottom',
                labels: {
                    boxWidth: 10,
                    color : colors.colorInfoDark,
                  }
            }
        },
        scales : {
            x : {
                grid : {
                    display : false
                }
            },
            y : {
                grid : {
                    display : true
                }
            }
        },
        responsive : true
    }
})
function addData(chart, newDatas) {
    newDatas.forEach((newData) => {
        chart.data.datasets.push({
       label : newData.name,
       data : newData.data,
       borderColor : newData.color,
       backgroundColor : newData.color,
       borderWidth : 2
        })
        
    });
    chart.update();
}

function changeData(chart,newDatas) {
    newdtsets = []
    newDatas.forEach((newData) => {
        newdtsets.push({
       label : newData.name,
       data : newData.data,
       borderColor : newData.color,
       backgroundColor : newData.color,
       borderWidth : 2
        })

    });
    chart.data.datasets = newdtsets;
    chart.update();
}

// 1st Datasets
const bmthdt =[{x : 'Jan', y: 20000},{x : 'Feb', y: 10000},{x : 'Mar', y: 15000},{x : 'Apr', y: 25000},{x : 'May', y: 20000},{x : 'Jun', y: 7000}]
const smthdt =[{x : 'Jan', y: 10000},{x : 'Feb', y: 15000},{x : 'Mar', y: 11000},{x : 'Apr', y: 20000},{x : 'May', y: 5000},{x : 'Jun', y: 2000}]
const mdata = [{name : 'Burger',data : bmthdt , color : '#ffbb55'},{name : 'Sandwich',data : smthdt , color : '#da0a1c'}];

const bmthdt2 =[{x : 'Jan', y: 10},{x : 'Feb', y: 25},{x : 'Mar', y: 5},{x : 'Apr', y: 2},{x : 'May', y: 13},{x : 'Jun', y: 7}]
const smthdt2 =[{x : 'Jan', y: 5},{x : 'Feb', y: 10},{x : 'Mar', y: 11},{x : 'Apr', y: 25},{x : 'May', y: 9},{x : 'Jun', y: 2}]
const mdata2 = [{name : 'Burger',data : bmthdt2 , color : '#ffbb55'},{name : 'Sandwich',data : smthdt2 , color : '#da0a1c'}];

function swap(btn){
    if(btn.innerText=='Amount'){
    changeData(chartobj,mdata2)
    btn.innerText='Qty';}
    else{
    changeData(chartobj,mdata)
    btn.innerText='Amount';
    }
}
addData(chartobj,mdata);

