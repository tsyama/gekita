import React, { Component } from 'react';
import ScenarioDeleteBtn from "./ScenarioDeleteBtn";

export default class ScenarioRecord extends Component {
    constructor(props) {
        super(props);
        this.state = {
            scenarioId: props.scenario_id,
            title: props.title,
            updatedAt: props.updated_at
        };
    }

    render() {
        return (
            <tr>
                <td>{this.state.updatedAt}</td>
                <td><a href={ "/scenarios/" + this.state.scenarioId + "/edit/"}>{this.state.title}</a></td>
                <td>
                    <div className="row">
                        <div className="col-sm">
                            <button className="btn btn-sm btn-outline-primary btn-block">読む</button>
                        </div>
                        <div className="col-sm">
                            <button className="btn btn-sm btn-outline-success btn-block">編集</button>
                        </div>
                        <div className="col-sm">
                            <ScenarioDeleteBtn scenario_id={this.state.scenarioId}/>
                        </div>
                    </div>
                </td>
            </tr>
        );
    }
}
