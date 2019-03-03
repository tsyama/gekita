import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Title extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: 'gekita'
        };
    }

    changeTitle(value) {
        console.log(value);
        document.title = value;
    }

    render() {
        return (
            <input id="gekiTitle" className="form-control" onInput={(e) => {document.title = e.target.value}} placeholder="タイトル"
                       aria-label="タイトル" />
        );
    }
}

ReactDOM.render(
    <Title />,
    document.getElementById('titleInput')
);
