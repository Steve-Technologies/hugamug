//Colors
const colors = {
    colorPrimary: "#a37424",
    colorSecondary: '#e4c590',
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

// Dummy Datasets that would be actually coming from APIs
    //sales
        //amount
const burger_sales_amount_data =[{x : 'Jan', y: 20000},{x : 'Feb', y: 10000},{x : 'Mar', y: 15000},{x : 'Apr', y: 25000},{x : 'May', y: 20000},{x : 'Jun', y: 7000}]
const sandwich_sales_amount_data =[{x : 'Jan', y: 10000},{x : 'Feb', y: 15000},{x : 'Mar', y: 11000},{x : 'Apr', y: 20000},{x : 'May', y: 5000},{x : 'Jun', y: 2000}]
const sales_amount_data = [{name : 'Burger',data : burger_sales_amount_data , color : '#ffbb55'},{name : 'Sandwich',data : sandwich_sales_amount_data , color : '#da0a1c'}];

        //qty
const burger_sales_qty_data =[{x : 'Jan', y: 10},{x : 'Feb', y: 25},{x : 'Mar', y: 5},{x : 'Apr', y: 2},{x : 'May', y: 13},{x : 'Jun', y: 7}]
const sandwich_sales_qty_data =[{x : 'Jan', y: 5},{x : 'Feb', y: 10},{x : 'Mar', y: 11},{x : 'Apr', y: 25},{x : 'May', y: 9},{x : 'Jun', y: 2}]
const sales_qty_data = [{name : 'Burger',data : burger_sales_qty_data , color : '#ffbb55'},{name : 'Sandwich',data : sandwich_sales_qty_data , color : '#da0a1c'}];

const sales_data = {amount : sales_amount_data, qty : sales_qty_data};

    //refunds
        //qty
const refund_qty_raw_data =[{x : 'Jan', y: 5},{x : 'Feb', y: 3},{x : 'Mar', y: 8},{x : 'Apr', y: 10},{x : 'May', y: 11},{x : 'Jun', y: 2}]
const refund_qty_data = [{name : 'Refunds' ,data : refund_qty_raw_data , color : '#a37424'}];
        //amount
const refund_amount_raw_data =[{x : 'Jan', y: 2500},{x : 'Feb', y: 1500},{x : 'Mar', y: 4000},{x : 'Apr', y: 5000},{x : 'May', y: 5500},{x : 'Jun', y: 1000}]
const refund_amount_data = [{name : 'Refunds' ,data : refund_amount_raw_data , color : '#a37424'}];

const refund_data = {amount : refund_amount_data , qty : refund_qty_data};

    //discounts
        //qty
        const discount_qty_raw_data =[{x : 'Jan', y: 10},{x : 'Feb', y: 13},{x : 'Mar', y: 2},{x : 'Apr', y: 5},{x : 'May', y: 7},{x : 'Jun', y: 15}]
        const discount_qty_data = [{name : 'Discounts' ,data : discount_qty_raw_data , color : '#a37424'}];
                //amount
        const discount_amount_raw_data =[{x : 'Jan', y: 1000},{x : 'Feb', y: 1300},{x : 'Mar', y: 1000},{x : 'Apr', y: 7000},{x : 'May', y: 5500},{x : 'Jun', y: 1500}]
        const discount_amount_data = [{name : 'Discounts' ,data : discount_amount_raw_data , color : '#a37424'}];
        
        const discount_data = {amount : discount_amount_data , qty : discount_qty_data};

// final chart data object
const chart_data = {sales : sales_data, refunds : refund_data, discounts : discount_data};

// Actual JS Script

//utils
function toggle_active(e,activated){
    parent = e.parentElement;
    parent.querySelector('.active').classList.remove('active');
    e.classList.add('active');
    activated(e);
 }


//chart
//chart utils
/**
 * Changes the data of the chart.
 * @param {Chart} chart - The chart instance to update.
 * @param {Object} newDatas - An object containing the new data for the chart.
 */
function changeData(chart,newDatas) {
    console.log(newDatas);
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
//report-type
// const report_type_map = {'sales': };
report_menu = document.querySelectorAll('.report-type');
report_menu.forEach((menu) => {
    menu.addEventListener('click', () => {
        toggle_active(menu, (e) => {
            btn = document.querySelector('.metric_swap');
            changeData(chartobj,chart_data[e.id][btn.dataset.metric]);});
        })
    })





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
/**
 * Adds new data to the chart.
 * @param {Chart} chart - The chart instance to update.
 * @param {Object} newDatas - An object containing the new data for the chart.
 */
function addData(chart, newDatas) {
    // Iterates over the new data and adds it to the chart.
    newDatas.forEach((newData) => {
        // Adds a new dataset to the chart with the provided data, color, and border width.
        chart.data.datasets.push({
            label: newData.name,
            data: newData.data,
            borderColor: newData.color,
            backgroundColor: newData.color,
            borderWidth: 2
        });
    });

    // Updates the chart with the new data.
    chart.update();
}






/**
 * Swaps the chart data between 'amount' and 'qty' metrics.
 * @param {HTMLButtonElement} btn - The button that triggers the swap.
 */
function amt_qty_swap(btn) {
    // Get the active tab element
    const active_tab = document.querySelector('.report-type.active');
    
    // Get the current metric from the button's dataset
    const metric_to_change = btn.dataset.metric === 'amount' ? 'qty' : 'amount';
    
    // Change the data of the chart to the new metric
    changeData(chartobj, chart_data[active_tab.id][metric_to_change]);
    
    // Update the button's text to reflect the new metric
    btn.children[0].innerText = btn.dataset.metric === 'amount' ? 'stacks' : 'attach_money';
    btn.children[1].innerText = btn.dataset.metric === 'amount' ? 'Qty' : 'Amount';
    
    // Update the button's dataset with the new metric
    btn.dataset.metric = metric_to_change;
}
    
/**
 * Swaps the chart type between 'bar' and 'line'.
 * @param {HTMLButtonElement} btn - The button that triggers the swap.
 */
function swap_chart_type(btn) {
    console.log(btn);
    if (btn.children[1].innerText === 'Bar Chart') {
        // Changes the chart type to 'line'.
        chartobj.config.type = 'line';
        // Updates the chart with the new type.
        chartobj.update();
        // Updates the button's text to reflect the new chart type.
        btn.children[0].innerText = 'show_chart';
        btn.children[1].innerText = 'Line Chart';
    } else {
        // Changes the chart type to 'bar'.
        chartobj.config.type = 'bar';
        // Updates the chart with the new type.
        chartobj.update();
        // Updates the button's text to reflect the new chart type.
        btn.children[0].innerText = 'bar_chart';
        btn.children[1].innerText = 'Bar Chart';
    }
}
addData(chartobj,sales_amount_data);

