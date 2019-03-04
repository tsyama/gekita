import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class GekiEditor extends Component {
    constructor(props) {
        super(props);
        this.state = {
            body: ''
        };
    }

    render() {
        return (
            <div className="row" >
                <div className="col-sm">
                <textarea className="form-control h-75" onInput={(e) => {
                    this.setState({body: e.target.value});
                }} />
                </div>
                <div className = "col-sm">
                    <div className="card bg-white h-75">
                        <div className = "card-header" > プレビュー </div>
                        <div className="card-body">
                            <p>{this.state.body}</p>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

ReactDOM.render(
    <GekiEditor />,
    document.getElementById('gekiEditor')
);
