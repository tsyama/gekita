import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import ScenarioRecord from "./ScenarioRecord";
import GekitaApi from "../GekitaApi";
import GekiToast from "./GekiToast";

let scenarioTable = document.getElementById("scenarioTable");

export default class ScenarioTable extends Component {
    constructor(props) {
        super(props);
        this.state = {
            scenarios: []
        };
        this.getScenarioList();
    }

    render() {
        return (
            <table className="table">
                <thead className="thead-dark">
                <tr>
                    <th>#</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                {
                    Array.from(this.state.scenarios).map((item, index) => {
                        return (
                            <ScenarioRecord scenario_id={item.id} title={item.title} updated_at={item.updated_at} key={index}/>
                        );
                    })
                }
                </tbody>
            </table>
        );
    }

    getScenarioList() {
        GekitaApi.scenarioList((result) => {
            this.setState({scenarios: result.data.scenarios});
        }, () => {
            GekiToast.alert("脚本一覧の取得に失敗しました");
        })
    }
}

if (scenarioTable) {
    ReactDOM.render(
        <ScenarioTable />,
        scenarioTable
    );
}
