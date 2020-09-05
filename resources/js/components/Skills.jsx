import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import IconPulse from './icon-pulse';
import ItemSkill from './item-skill';

const Skills = () => {

  const [skills, setSkills] = useState([]);
  const [selectSkills, setSelectSkills] = useState(new Set())
  const [fetching, setFetching] = useState(false);

  const data = async () => {
    setFetching(true);
    try {
      const req = await fetch('http://localhost:8000/skills');
      const res = await req.json();
      
      setSkills(res);

      setFetching(false);

    } catch (error) {
      console.log(error);
      setFetching(false);
    }
  }

  useEffect(() => {
    data();
  }, []);

  return (
    <React.Fragment>
      { fetching ? (
        <div className="flex items-center justify-center flex-col">
          <IconPulse/>
          <p className="text-xs text-gray-500 block mt-2">Cargando...</p>
        </div>
      ) : (
        <div>
          <ul className="flex items-center justify-center flex-wrap space-x-1 space-y-1 font-medium text-gray-600 text-xs">
            {skills.map(item => (
              <ItemSkill key={item.id} item={ item } selectSkills={ selectSkills } setSelectSkills={ setSelectSkills }/>
            ))}
          </ul>
          <input type="hidden" name="skills" id="skills"/>
        </div>
      ) }
    </React.Fragment>
  );
};

export default Skills;

if (document.getElementById('example')) {
  ReactDOM.render(<Skills />, document.getElementById('example'));
}
