<div id="redeptioms-section" class="wrap" data-user-id="<?php echo wp_get_current_user()->data->ID ?>" data-site="<?php echo get_site_url(); ?>">
    <h2 class="mb-1">Redemptions</h2>
    <div class="mb-1">
    <ul id="redemptions-status" class="subsubsub mb-1">
        <li class="all"><a href="admin.php?page=redemptions">All <span class="count">(0)</span></a> |</li>
        <li class="approved"><a href="admin.php?page=redemptions&status=approved">Approved <span class="count">(0)</span></a> |</li>
        <li class="rejected"><a href="admin.php?page=redemptions&status=rejected">Rejected <span class="count">(0)</span></a></li>
        <li class="pending"><a href="admin.php?page=redemptions&status=pending">Pending <span class="count">(0)</span></a></li>
    </ul>
    </div>
    <table class="widefat fixed mb-1" cellspacing="0">
        <thead>
            <tr>
                <th id="columnname" class="manage-column column-columnname" scope="col">ID</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Fecha</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">User</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Email</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Buy date</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Shop</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Country</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Serie</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Invoice</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Status</th>
            </tr>
        </thead>
        <tbody id="redemptions"></tbody>
    </table>
    <div class="flex-container align-center">
        <button id="load-more" class="button button-primary" onclick="loadMore()">Load more...</button>
    </div>
</div>

<script>
    let site_url = document.getElementById('redeptioms-section').getAttribute('data-site'),
        user_id = document.getElementById('redeptioms-section').getAttribute('data-user-id'),
        status = new URLSearchParams(window.location.search).get('status'),
        page = 1;

    const API = `${site_url}/wp-json/custom/v1`;

    /**
     * @mountRedemptionsStatus
     * @mountRedemtions
     */

    function mountRedemptionsStatus(current, status){
        let redemptionsStatus = document.querySelector('#redemptions-status');

        redemptionsStatus.querySelector(`.${current} a`).classList.add('current');
        
        redemptionsStatus.querySelector('.all span').innerHTML = `(${status.all})`;
        redemptionsStatus.querySelector('.approved span').innerHTML = `(${status.approved})`;
        redemptionsStatus.querySelector('.rejected span').innerHTML = `(${status.rejected})`;
        redemptionsStatus.querySelector('.pending span').innerHTML = `(${status.pending})`;
    }

    function mountRedemtions(redemptions){
        let redemptionsDOM = document.querySelector('#redemptions'),
            template = `
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: #242424; padding: 3rem 0">
                    <tr>
                    <td width="100%" align="center">
                        <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="600" align="center">
                            <div style="background: white; width: 70%; min-width: 310px;">
                                <header style="background: #C42825; padding: 1rem; color: white;">
                                    <img src="https://i.imgur.com/blMHHGk.png" style="width: 80px;">
                                </header>
        
                                <div style="padding: 1rem;">
                                    <h1 style="font-size: 25px; font-weight: 900; margin-bottom: 1rem">You redemption was approved!</h1>
                                    <div style="text-align: center">Your code is: <b>[code here]<b></div>
                                </div>
        
                                <footer style="text-align: center; background: #C42825; padding: 1rem; color: white;"">
                                    All rights reserved | Inka Labs
                                </footer>
                            </div>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
            `

        redemptions.list.forEach((red, index)=>{
            redemptionsDOM.innerHTML += `
            <tr id="redemption-${index}" valign="top">
                <td class="manage-column column-columnname" scope="col">
                    ${red.id}
                    <div class="row-actions">
                        <span><a href="#"><label for="row-${index}">Approve</label></a> |</span>
                        <span class="trash"><a href="#" onclick="rejectRedemption('${red.id}', ${index}, this)">Reject</a></span>
                    </div>
                </td>
                <td class="manage-column column-columnname" scope="col">${red.date_at}</td>
                <td class="manage-column column-columnname" scope="col">
                    ${red.firstname}, ${red.lastname}
                </td>
                <td class="manage-column column-columnname" scope="col">${red.email}</td>
                <td class="manage-column column-columnname" scope="col">${red.buy_date}</td>
                <td class="manage-column column-columnname" scope="col">${red.shop}</td>
                <td class="manage-column column-columnname" scope="col">${red.country}</td>
                <td class="manage-column column-columnname" scope="col">${red.serie}</td>
                <td class="manage-column column-columnname" scope="col">
                    <p>
                        Number: <b>${red.invoice_number}</b>
                    </p>
                    <p>
                        File: <a href="${site_url}/wp-content/uploads/redemptions/${red.invoice_file}" target="_blank">Descargar</a>
                    </p>
                </td>
                <td class="manage-column column-columnname" scope="col">${ (red.status != '') ? red.status : 'Pending' }</td>
            </tr>
            <tr id="redemption-expanded-${index}" class="c-expanded">
                <td colspan="10">
                    <input type="checkbox" id="row-${index}" class="hide">
                    <div class="c-expanded__editor width-100">
                        <h3 class="mt-0 mb-1">Send code to user</h3>
                        <div id="row-template-${index}" class="c-expanded__mail mb-1" contenteditable>${template}</div>
                        <div class="flex-container">                        
                            <button class="button button-primary mr-1" onclick="sendCode('${red.id}', '${red.email}', ${index}, this)">Enviar codigo</button>
                            <p id="row-response-${index}" class="c-response mr-1"></p>
                        </div>
                    </div>
                </td>
            </tr>
            `
        })

        if(redemptions.list.length == 0){
            document.querySelector('#load-more').classList.add('hide')
        }
    }

    /**
     * @getRedemptions
     * @loadMore
     * @sendCode
     * @rejectRedemption
     */

    function getRedemptions(status, page = 1){
        switch(status){
            case 'approved':              
            case 'rejected':          
            case 'pending':
                fetch(`${API}/redemptions?status=${status}&page=${page}&user=${user_id}`)
                    .then(res => {
                        if (res.status >= 200 && res.status < 300) {
                            return res.json()
                        }else{
                            throw res
                        }
                    })
                    .then(redemptions => {
                        mountRedemptionsStatus(status, redemptions.status)
                        mountRedemtions(redemptions);
                    })
                    .catch(err => {
                        throw err;       
                    }) 
                break;               
            default:
                fetch(`${API}/redemptions?page=${page}&user=${user_id}`)
                    .then(res => {
                        if (res.status >= 200 && res.status < 300) {
                            return res.json()
                        }else{
                            throw res
                        }
                    })
                    .then(redemptions => {
                        mountRedemptionsStatus('all', redemptions.status)
                        mountRedemtions(redemptions);
                    })
                    .catch(err => {
                        document.querySelector('#load-more').classList.add('hide')
                        throw err;       
                    })
                break;
        }
    }

    function loadMore(){
        getRedemptions(status, page + 1); page ++;
    }

    function sendCode(res_id, user_email, row_index, button){
        let form_data = new FormData();

        form_data.append('user', user_email);
        form_data.append('mail', document.querySelector(`#row-template-${row_index}`).innerHTML);

        button.innerHTML = 'Enviando...'

        fetch(`${API}/redemption/${res_id}/approve`,{
                method: 'POST',
                body: form_data
            })
            .then(res => {
                if (res.status >= 200 && res.status < 300) {
                    return res.json()
                }else{
                    throw res
                }
            })
            .then(email => {
                document.querySelector(`#row-response-${row_index}`).classList.add('ok');
                document.querySelector(`#row-response-${row_index}`).innerHTML = 'Sent code';
                button.innerHTML = 'Enviar codigo'

                window.setTimeout(()=>{
                    window.location = '';
                }, 500)
            })
            .catch(err => {
                document.querySelector(`#row-response-${row_index}`).classList.add('error');
                document.querySelector(`#row-response-${row_index}`).innerHTML = "Code couldn't send";
                button.innerHTML = 'Enviar codigo'
                throw err;       
            })         
    }

    function rejectRedemption(res_id, row_index, link){
        link.parentNode.classList.add('loading');

        fetch(`${API}/redemption/${res_id}/reject`,{
                method: 'DELETE'
            })
            .then(res => {
                if (res.status >= 200 && res.status < 300) {
                    return res.json()
                }else{
                    throw res
                }
            })
            .then(_redemption => {
                link.parentNode.classList.remove('loading'); window.location = '';
            })
            .catch(err => {
                link.parentNode.classList.remove('loading'); throw err;       
            })        
    }
    
    /**
     * Main
     */
    if (!status) {
        getRedemptions();   
    } else{
        getRedemptions(status);
    }
</script>
