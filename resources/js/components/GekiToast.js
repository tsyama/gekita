import React, { Component } from 'react';
import ReactDOM from 'react-dom';

let gekiToast = document.getElementById("gekiToast");
export let gekiToastComponent;

export default class GekiToast extends Component{
    constructor(props) {
        super(props);
        this.state = {
            message: ""
        };
    }

    render() {
        gekiToastComponent = this;
        return(
            <div className="toast border-info" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div className="toast-header">
                    <strong className="mr-auto">Gekita</strong>
                    <button type="button" className="ml-2 mb-1 close" data-dismiss="toast" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div className="toast-body">
                    {this.state.message}
                </div>
            </div>
        );
    }

    static alert(message) {
        $(".toast-body").text(message);
        $(".toast").toast("show");
    }
}

if (gekiToast) {
    ReactDOM.render(
        <GekiToast />,
        gekiToast
    );
}
