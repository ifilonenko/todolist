<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To Do List</title>
    <script src="http://fb.me/react-0.8.0.js"></script>
    <script src="http://fb.me/JSXTransformer-0.8.0.js"></script>
  </head>
  <body>
      <div id="content"></div>
      <script type="text/jsx">
      /***@jsx React.DOM */

      var ToDoListApp = React.createClass({
        getInitialState:function(){
          return {data:[],assignment:'',date:''}
        },
        onChangeAssignment:function(e){
          this.setState({assignment:e.target.value})
        },
        onChangeDate:function(e){
          this.setState({date:e.target.value})
        },
        handleSubmit:function(e){
          e.preventDefault();
          this.state.data.push({assignment:this.state.assignment,date:this.state.date});
          this.setState({assignment:'',date:''})
        },
        render:function(){
          return (
            <div>
              <h1>This is your To Do List</h1>
              <form onSubmit ={this.handleSubmit}>
              <input type="text" value={this.state.assignment} onChange={this.onChangeAssignment} />
              <input type="text" value={this.state.date} onChange={this.onChangeDate} />
              <button>Add</button>
              </form>
              <ToDoList data={this.state.data} />
            </div>
            )
        }
 });
 var ToDo = React.createClass({
  render:function(){
    return(
      <div>
        <h2>{this.props.assignment} needs to be done by {this.props.date}</h2>
        </div>
        )
  }
 })

 var ToDoList = React.createClass({
    render:function(){
      var todos = this.props.data.map(function(todo){
        return <ToDo assignment={todo.assignment} date={todo.date} />
      });
      return (
        <div>
        {todos}
        </div>
        )
    }
 })

 React.renderComponent(<ToDoListApp />, document.getElementById('content'))

 </script>
</body>
</html>