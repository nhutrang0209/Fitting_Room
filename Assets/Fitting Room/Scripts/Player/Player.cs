using System;
using UnityEngine;

namespace Fitting_Room
{
    public class Player : MonoBehaviour
    {
        [SerializeField] private Transform modelTransform;
        
        [SerializeField] private float defaultHeight;
        [SerializeField] private float defaultWeight;

        private Vector3 _originScale;

        private void Start()
        {
            
        }

        public void ChangeHeight(float newHeight)
        {

            _originScale = modelTransform.localScale;
            var newYScale = _originScale.y * newHeight / defaultHeight;

            var newScale = new Vector3(_originScale.x, newYScale, _originScale.z);

            modelTransform.localScale = newScale;
        }

        public void ChangeWeight(float newWeight)
        {
            _originScale = modelTransform.localScale;
            var newXScale = _originScale.x * newWeight / defaultWeight;
            var newScale = new Vector3(newXScale, _originScale.y, _originScale.z);
            modelTransform.localScale = newScale;
        }
    }
}