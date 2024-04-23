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

if(document.querySelector('#chart')){
const chartobj = new Chart(chart, {
    type: 'bar',
    options: {
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 10,
                    color: colors.colorInfoDark,
                }
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                }
            },
            y: {
                grid: {
                    display: true
                }
            }
        },
        responsive: true
    }
})
let chart_data;
//fetch data
fetch('chart_data.json')
  .then(response => {
    // Check if the response is successful
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    // Parse the JSON data from the response
    return response.json();
  })
  .then(data => {
    // Assign the fetched JSON data to a variable
    chart_data = data;
    addData(chartobj, chart_data.sales.amount);
    // Now you can use the jsonData variable to access the fetched data
  })
  .catch(error => {
    console.error('There was a problem fetching the data:', error);
  });
}
//order data
order_view = document.querySelector('#order_view');
let orders;
if(document.querySelector('#order-table tbody')){
fetch('order_data.json')
.then(response => {
  // Check if the response is successful
  if (!response.ok) {
    throw new Error('Network response was not ok');
  }
  // Parse the JSON data from the response
  return response.json();
})
.then(data => {
  // Assign the fetched JSON data to a variable
  orders = data;

    order_table_tbody= document.querySelector('#order-table tbody');
    fetch_order_table(orders, order_table_tbody,order_view)
  // Now you can use the jsonData variable to access the fetched data
})
.catch(error => {
  console.error('There was a problem fetching the data:', error);
});
}

let orders2;
if(document.querySelector('#order-table-main tbody')){
fetch('main_order_data.json')
.then(response => {
  // Check if the response is successful
  if (!response.ok) {
    throw new Error('Network response was not ok');
  }
  // Parse the JSON data from the response
  return response.json();
})
.then(data => {
  // Assign the fetched JSON data to a variable
  orders2 = data;

    order_table_tbody= document.querySelector('#order-table-main tbody');
    fetch_order_table(orders2, order_table_tbody, order_view)
  // Now you can use the jsonData variable to access the fetched data
})
.catch(error => {
  console.error('There was a problem fetching the data:', error);
});
}



// Actual JS Script

//utils
function toggle_active(e, activated) {
    parent = e.parentElement;
    parent.querySelector('.active').classList.remove('active');
    e.classList.add('active');
    activated(e);
}

if(document.querySelector('#chart')){
//chart
//chart utils
/**
 * Changes the data of the chart.
 * @param {Chart} chart - The chart instance to update.
 * @param {Object} newDatas - An object containing the new data for the chart.
 */
function changeData(chart, newDatas) {
    newdtsets = []
    newDatas.forEach((newData) => {
        newdtsets.push({
            label: newData.name,
            data: newData.data,
            borderColor: newData.color,
            backgroundColor: newData.color,
            borderWidth: 2
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
            if(chart_data[e.id][btn.dataset.metric].length==0)
            {
            amt_qty_swap(btn)
            }
            btn = document.querySelector('.metric_swap');
            changeData(chartobj, chart_data[e.id][btn.dataset.metric]);
        });
    })
})






const chart = document.querySelector('#chart').getContext('2d');
//new chart instance

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

    if(chart_data[active_tab.id][metric_to_change].length!=0)
    {
    // Change the data of the chart to the new metric
    changeData(chartobj, chart_data[active_tab.id][metric_to_change]);

    // Update the button's text to reflect the new metric
    btn.children[0].innerText = btn.dataset.metric === 'amount' ? 'stacks' : 'attach_money';
    btn.children[1].innerText = btn.dataset.metric === 'amount' ? 'Qty' : 'Amount';

    // Update the button's dataset with the new metric
    btn.dataset.metric = metric_to_change;
    }
}

/**
 * Swaps the chart type between 'bar' and 'line'.
 * @param {HTMLButtonElement} btn - The button that triggers the swap.
 */
function swap_chart_type(btn) {
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
}

//order js

function fetch_order_table(orders, table_tbody, view_popup){
    orders.forEach((order) => {
        const row = document.createElement('tr');
        const idCell = document.createElement('td');
        idCell.textContent = order.id;
        row.appendChild(idCell);
        const customerNameCell = document.createElement('td');
        customerNameCell.textContent = order.customer_name;
        row.appendChild(customerNameCell);
        const tableNoCell = document.createElement('td');
        tableNoCell.textContent = order.table_no;
        row.appendChild(tableNoCell);
        const statusCell = document.createElement('td');
        statusCell.className = order.status === 'rejected' ? 'status-rejected' : order.status === 'cancelled' ? 'status-cancelled' : order.status === 'preparing' ? 'status-preparing' : order.status === 'completed' ? 'status-completed' : order.status === 'preparing' ? 'status-preparing' : '';
        const statusSpan = document.createElement('span');
        statusSpan.textContent = order.status.charAt(0).toUpperCase() + order.status.slice(1);
        statusCell.appendChild(statusSpan);
        row.appendChild(statusCell);
        const amountCell = document.createElement('td');
        amountCell.textContent = `TZS ${order.amount}`;
        row.appendChild(amountCell);
        const typeCell = document.createElement('td');
        typeCell.textContent = order.type;
        row.appendChild(typeCell);
        const sourceCell = document.createElement('td');
        
        if(order.source!='Online'){
        const sourceLink = document.createElement('a');
        sourceLink.href = '#';
        sourceLink.textContent = order.source;
        sourceCell.appendChild(sourceLink);
        }
        else{
            sourceCell.textContent = order.source;
        }
        row.appendChild(sourceCell);
        const btnColCell = document.createElement('td');
        btnColCell.className = 'btn-col';
        const viewBtn = document.createElement('button');
        viewBtn.onclick = (e)=>{
            view_popup.showModal();
        }
        viewBtn.tooltip = 'View';
        viewBtn.className = 'primary-btn tooltip';
        const viewIcon = document.createElement('span');
        viewIcon.className = 'material-symbols-rounded';
        viewIcon.textContent = 'visibility';
        viewBtn.appendChild(viewIcon);
        btnColCell.appendChild(viewBtn);
        const editLink = document.createElement('a');
        editLink.href = '#';
        editLink.tooltip = 'Edit';
        editLink.className = 'primary-btn';
        const editIcon = document.createElement('span');
        editIcon.className = 'material-symbols-rounded';
        editIcon.textContent = 'edit';
        editLink.appendChild(editIcon);
        btnColCell.appendChild(editLink);
        row.appendChild(btnColCell);
        table_tbody.appendChild(row);
        });
 }

 function close_popup(e){
    console.log(e);
    e.parentElement.parentElement.parentElement.close();
 }

