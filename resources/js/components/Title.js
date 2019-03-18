import React, { Component } from 'react';
import ReactDOM from 'react-dom';

let titleInput = document.getElementById("titleInput");

export default class Title extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: titleInput.dataset.title ? titleInput.dataset.title : ""
        };
        document.title = this.state.title;
    }

    render() {
        return (
            <input id="gekiTitle" className="form-control" onChange={(e) => {
                this.setState({title: e.target.value}, () => {
                    document.title = this.state.title;
                });
            }} defaultValue={this.state.title} placeholder="タイトル" aria-label="タイトル" />
        );
    }
}

if (titleInput) {
    ReactDOM.render(
        <Title />,
        titleInput
    );
}
