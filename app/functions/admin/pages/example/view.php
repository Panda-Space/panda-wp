<div 
    id="examples-section" 
    class="wrap"
    data-site="<?php echo get_site_url(); ?>">
    <h2 class="mb-1">Examples</h2>
    <a  
        href="<?php echo get_site_url() . '/wp-json/custom/v1/examples/download' ?>" 
        download 
        class="button button-primary">
        Descargar todo (.xls)
    </a>
    <div class="mb-1">
    <ul id="examples-metas" class="subsubsub mb-1">
        <li class="all"><a href="admin.php?page=examples">All <span class="count">(0)</span></a> |</li>
        <li class="approved"><a href="admin.php?page=examples&status=approved">Approved <span class="count">(0)</span></a> |</li>
        <li class="rejected"><a href="admin.php?page=examples&status=rejected">Rejected <span class="count">(0)</span></a></li>
        <li class="pending"><a href="admin.php?page=examples&status=pending">Pending <span class="count">(0)</span></a></li>
    </ul>
    </div>
    <table class="widefat fixed mb-1" cellspacing="0">
        <thead>
            <tr>
                <th id="columnname" class="manage-column column-columnname" scope="col">ID</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Fecha</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Column 1</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Column 2</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Column 3</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">...</th>
            </tr>
        </thead>
        <tbody id="examples"></tbody>
    </table>
    <div class="flex-container align-center">
        <button id="load-more" class="button button-primary" onclick="loadMore()">Load more...</button>
    </div>
</div>

<script>
    let site_url = document.getElementById('examples-section').getAttribute('data-site'),
        status = new URLSearchParams(window.location.search).get('status'),
        page = 1;

    const API = `${site_url}/wp-json/custom/v1`;

    /**
     * @mountExamplesMetas
     * @mountExamples
     */

    function mountExamplesMetas(current, metas){
        let examplesMetas = document.querySelector('#examples-metas');

        examplesMetas.querySelector(`.${current} a`).classList.add('current');
        
        examplesMetas.querySelector('.all span').innerHTML = `(${metas.all})`;
        examplesMetas.querySelector('.approved span').innerHTML = `(${metas.approved})`;
        examplesMetas.querySelector('.rejected span').innerHTML = `(${metas.rejected})`;
        examplesMetas.querySelector('.pending span').innerHTML = `(${metas.pending})`;
    }

    function mountExamples(examples){
        let examplesDOM = document.querySelector('#examples')

        examples.list.forEach((participant, index)=>{
            examplesDOM.innerHTML += `
                <tr id="participant-${participant.id}" valign="top" class="${ ((index + 1) % 2 == 0) ? 'alternate' : '' }">
                    <td class="manage-column column-columnname" scope="col">...</td>
                </tr>
            `
        })

        if(examples.list.length == 0 || examples.list.length < 20){
            document.querySelector('#load-more').classList.add('hide')
        }
    }

    /**
     * @getExamples
     * @loadMore
     */

    function getExamples(status, page = 1){
        switch(status){
            case 'approved':              
            case 'rejected':
            case 'pending':
                fetch(`${API}/examples?status=${status}&page=${page}`)
                    .then(res => {
                        if (res.status >= 200 && res.status < 300) {
                            return res.json()
                        }else{
                            throw res
                        }
                    })
                    .then(examples => {
                        mountExamplesMetas(status, examples.metas)
                        mountExamples(examples);
                    })
                    .catch(err => {
                        throw err;       
                    })
                break;
            default:
                fetch(`${API}/examples?page=${page}`)
                        .then(res => {
                            if (res.status >= 200 && res.status < 300) {
                                return res.json()
                            }else{
                                throw res
                            }
                        })
                        .then(examples => {
                            mountExamplesMetas('all', examples.metas)
                            mountExamples(examples);
                        })
                        .catch(err => {
                            throw err;       
                        })
                    break;
        }
    }

    function loadMore(){
        getExamples(status, page + 1); page ++;
    }

    if (!status) {
        getExamples();
    }else {
        getExamples(status);
    }
</script>
