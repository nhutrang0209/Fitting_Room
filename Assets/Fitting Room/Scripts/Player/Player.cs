using System;
using UnityEngine;

namespace Fitting_Room
{
    public class Player : MonoBehaviour
    {
        [SerializeField] private Transform modelTransform;
        
        [SerializeField] private float defaultHeight;

        private Vector3 _originScale;

        private void Start()
        {
            _originScale = modelTransform.localScale;
        }

        public void ChangeHeight(float newHeight)
        {

            var newYScale = _originScale.y * newHeight / defaultHeight;

            var newScale = new Vector3(_originScale.x, newYScale, _originScale.z);

            modelTransform.localScale = newScale;
        }
    }
}