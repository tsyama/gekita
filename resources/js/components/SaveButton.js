import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class SaveButton extends Component {
    scenarioSave() {
        let title = document.getElementById("gekiTitle").value;
        let body = document.getElementById("gekiBody").value;
        axios
            .post("/api/scenario", {title: title, body: body})
            .then((result) => {
                let scenario = result.data.scenario;
                window.location.href = "/scenarios/" + scenario.id + "/edit";
            })
            .catch(() => {
                console.log("通信に失敗しました");
            });
    }

    render() {
        return <input type="button" onClick={() => this.scenarioSave()} className="btn btn-outline-primary" value="保存" />
    }
}

ReactDOM.render(
    <SaveButton />,
    document.getElementById('saveButton')
);
