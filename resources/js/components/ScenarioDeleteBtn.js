import React, { Component } from 'react';
import GekitaApi from "../GekitaApi";
import GekiToast from "./GekiToast";

export default class ScenarioDeleteBtn extends Component {
    constructor(props) {
        super(props);
        this.state = {
            scenarioId: props.scenario_id
        };
    }

    render() {
        return (
            <button className="btn btn-sm btn-outline-danger btn-block scenario-delete-btn"
                    data-scenario-id={this.state.scenarioId} onClick={() => {
                        if (confirm("脚本を削除しますか？")) {
                            this.scenarioDelete();
                        }
                    }}>削除</button>
        );
    }

    scenarioDelete() {
        GekitaApi.scenarioDelete(this.state.scenarioId, (result) => {
            GekiToast.alert("脚本の削除に成功しました");
        }, (result) => {
            GekiToast.alert("脚本の削除に失敗しました");
        });
    }
}
