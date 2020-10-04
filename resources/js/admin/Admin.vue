<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Admin Dashboard</p>
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 p-0">
                                <div class="m-1 card p-1">
                                    <h3>Sales &nbsp;&nbsp;&nbsp;<span> 4010</span></h3>
                                    <p class="text-sm">(This Month)</p>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="m-1 card p-1">
                                    <h3>Orders &nbsp;&nbsp;&nbsp;<span> 2</span></h3>
                                    <p class="text-sm">(This Month)</p>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="m-1 card p-1">
                                    <h3>Sales &nbsp;&nbsp;&nbsp;<span> 4010</span></h3>
                                    <p class="text-sm">(This Month)</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="chart-wrap vertical">
                            <div class="grid">
                                <div class="bar" style="--bar-value:85%;" data-name="Your Blog" title="Your Blog 85%"></div>
                                <div class="bar" style="--bar-value:23%;" data-name="Medium" title="Medium 23%"></div>
                                <div class="bar" style="--bar-value:7%;" data-name="Tumblr" title="Tumblr 7%"></div>
                                <div class="bar" style="--bar-value:38%;" data-name="Facebook" title="Facebook 38%"></div>
                                <div class="bar" style="--bar-value:35%;" data-name="YouTube" title="YouTube 35%"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                <h4>Create A Quick Note</h4>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Remind Me To..." v-model="quick.title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="content" rows="3" placeholder="Content" v-model="quick.content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" @click.prevent="quicknote()">Create</button>
                </form>
                <br />
                <h4>Saved Drafts</h4>
                <div class="quick-drafts border">
                    <div class="card w-100 mb-1" v-for="note in notes" :key="note.id">
                        <div class="card-header">
                            <span class="material-icons" @click="deletenote(note['id'])">delete</span>{{ note['title'] }}
                        </div>
                        <div class="card-body">
                            {{ note['content'] }}
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
import Sidebar from './Sidebar';
export default {
    components: {
        'sidebar': Sidebar
    },
    data(){
        return{
            quick:{
                title:"",
                content:""
            },
            notes:[
                    id => '',
                    title => '',
                    content => '',
                    created_at => '',
                    updated_at => ''
            ],
            todelete:{
                id: ''
            }
        }
    },
    beforeCreate(){
            axios.get('/api/adminhome')
            .then(response => {this.message = response.data.message})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    methods:{
            async quicknote(){
                await axios.post('/api/quicknote/create', this.quick)
                .then(response => {console.log(response)})
                .catch(error => {console.log(error)});
            },
            async deletenote(id){
                this.todelete.id = id;
                await axios.post('/api/quicknote/delete', this.todelete)
                .then(response => {console.log(response)})
                .catch(error => {console.log(error)});
            }
        },
    mounted(){
        axios.post('/api/quicknote/get')
        .then(response => {
            console.log(response);
            this.notes = response.data;
        })
        .catch(error => {console.log(error)});
    }
    }
</script>


<style scoped>
.quick-drafts{
    height: 200px;
    overflow-y: auto;
}
.text-sm{
    font-size: 0.5rem;
}

/* BAR CHART */

.chart-wrap {
  margin-left: 50px;
  font-family: sans-serif;
  height: 550px;
  width: 400px;
}
.chart-wrap .title {
  font-weight: bold;
  font-size: 1.62em;
  padding: 0.5em 0 1.8em 0;
  text-align: center;
  white-space: nowrap;
}
.chart-wrap.vertical .grid {
  transform: translateY(-62px) translateX(52px) rotate(-90deg);
}
.chart-wrap.vertical .grid .bar::after {
  transform: translateY(-50%) rotate(45deg);
  display: block;
}
.chart-wrap.vertical .grid::before,
.chart-wrap.vertical .grid::after {
  transform: translateX(-0.2em) rotate(90deg);
}
.chart-wrap .grid {
  position: relative;
  padding: 5px 0 5px 0;
  height: 100%;
  width: 100%;
  border-left: 2px solid #aaa;
  background: repeating-linear-gradient(90deg, transparent, transparent 19.5%, rgba(170, 170, 170, 0.7) 20%);
}
.chart-wrap .grid::before {
  font-size: 0.8em;
  font-weight: bold;
  content: '0%';
  position: absolute;
  left: -0.5em;
  top: -1.5em;
}
.chart-wrap .grid::after {
  font-size: 0.8em;
  font-weight: bold;
  content: '100%';
  position: absolute;
  right: -1.5em;
  top: -1.5em;
}
.chart-wrap .bar {
  width: var(--bar-value);
  height: 50px;
  margin: 20px 0;
  background-color: #F16335;
  border-radius: 0 3px 3px 0;
}
.chart-wrap .bar:hover {
  opacity: 0.7;
}
.chart-wrap .bar::after {
  content: attr(data-name);
  margin-left: 100%;
  padding: 10px;
  display: inline-block;
  white-space: nowrap;
}

/* BAR CHART */
</style>