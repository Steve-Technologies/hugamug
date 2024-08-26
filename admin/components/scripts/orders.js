order_view = document.querySelector('#order_view');


let orders;
let orders_api_url = './test_admin_apis/main_order_data.json'
if(document.querySelector('#order-table-main tbody')){
fetch(orders_api_url)
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

    order_table_tbody= document.querySelector('#order-table-main tbody');
    fetch_order_table(orders, order_table_tbody, order_view)
  // Now you can use the jsonData variable to access the fetched data
})
.catch(error => {
  console.error('There was a problem fetching the data:', error);
});
}


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