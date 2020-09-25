<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded py-3 flex-grow-1">
            <h2>Welcome Admin,</h2>
            <div class="row">
                <div class="col-12 col-md-7">
                    Chart
                </div>
                <div class="col-12 col-md-5">
                <h4>Create A Quick Note</h4>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Remind Me To...">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="content" rows="3" placeholder="Content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                <br />
                <h4>Saved Drafts</h4>
                <div class="quick-drafts border">
                    <div class="card w-100 mb-1">
                        <div class="card-header">
                            <span class="material-icons">delete</span>Pending Action Blog
                        </div>
                        <div class="card-body">
                            Write A Blog On How Tos.
                        </div>
                    </div>
                    <div class="card w-100 mb-1">
                        <div class="card-header">
                            <span class="material-icons">delete</span>Change Tag Line
                        </div>
                        <div class="card-body">
                            Alpha To One.
                        </div>
                    </div>
                    <div class="card w-100 mb-1">
                        <div class="card-header">
                            <span class="material-icons">delete</span>Delete Users
                        </div>
                        <div class="card-body">
                            Delete Inactive Users.
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
    mounted(){
            axios.post('/api/admin')
            .then(response => {this.message = response.data.message})
            .catch(response =>{this.$router.push({name: 'Login'})});
        }
    }
</script>


<style scoped>
.quick-drafts{
    height: 200px;
    overflow-y: auto;
}
</style>