import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import IconPulse from './icon-pulse';
import ItemSkill from './item-skill';

const Skills = ({ oldSkills }) => {

  const [mounted, setMounted] = useState(false);
  const [skills, setSkills] = useState([]);
  const [olds, setOlds] = useState([]);
  const [selectSkills, setSelectSkills] = useState(new Set())
  const [fetching, setFetching] = useState(false);

  const data = async () => {
    setFetching(true);
    try {
      const req = await fetch('http://localhost:8000/skills');
      const res = await req.json();
      
      setSkills(res);
      setFetching(false);
      setMounted(true);

    } catch (error) {
      console.log(error);
      setFetching(false);
    }
  }

  useEffect(() => {
    if(mounted){
      if(oldSkills){
        const oldSkillsArray = oldSkills.split(',');
        setOlds(oldSkillsArray);
        oldSkillsArray.forEach(skill => selectSkills.add(skill));
      }
    }
  }, [mounted]);
  useEffect(() => {
    // Petición HTTP a las habilidades
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
              <ItemSkill key={item.id} item={ item } selectSkills={ selectSkills } setSelectSkills={ setSelectSkills } olds={ olds }/>
            ))}
          </ul>
          
        </div>
      ) }
    </React.Fragment>
  );
};

export default Skills;

if (document.getElementById('skills-list')) {
  ReactDOM.render(<Skills oldSkills={ oldSkills }/>, document.getElementById('skills-list'));
}
