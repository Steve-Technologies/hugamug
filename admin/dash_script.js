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
const bmthdt =[{x : 'Jan', y: 20},{x : 'Feb', y: 10},{x : 'Mar', y: 15},{x : 'Apr', y: 25},{x : 'May', y: 20},{x : 'Jun', y: 7}]
const smthdt =[{x : 'Jan', y: 10},{x : 'Feb', y: 15},{x : 'Mar', y: 11},{x : 'Apr', y: 20},{x : 'May', y: 5},{x : 'Jun', y: 2}]
const mdata = [{name : 'Burger',data : bmthdt , color : '#ffbb55'},{name : 'Sandwich',data : smthdt , color : '#da0a1c'}];
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

addData(chartobj,mdata);