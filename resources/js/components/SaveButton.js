import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import GekitaApi from '../GekitaApi';
import GekiToast from "./GekiToast";

let saveButton = document.getElementById("saveButton");

export default class SaveButton extends Component {
    constructor(props) {
        super(props);
        this.state = {
            scenarioId: saveButton.dataset.scenarioId ? saveButton.dataset.scenarioId : ""
        };
    }

    scenarioSave() {
        this.title = document.getElementById("gekiTitle").value;
        this.body = document.getElementById("gekiBody").value;

        if (this.state.scenarioId) {
            this.scenarioEdit();
        } else {
            this.scenarioCreate();
        }
    }

    scenarioCreate() {
        GekitaApi.scenarioCreate(this.title, this.body, (result) => {
            let scenario = result.data.scenario;
            window.location.href = "/scenarios/" + scenario.id + "/edit";
        }, () => {
            GekiToast.alert("変更の保存に失敗しました");
        });
    }

    scenarioEdit() {
        GekitaApi.scenarioEdit(this.state.scenarioId, this.title, this.body, () => {
            GekiToast.alert("変更を保存しました");
        }, () => {
            GekiToast.alert("変更の保存に失敗しました");
        });
    }

    render() {
        return <input type="button" onClick={() => this.scenarioSave()} className="btn btn-outline-primary" value="保存" />
    }
}

if (saveButton) {
    ReactDOM.render(
        <SaveButton />,
        saveButton
    );
}
